<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Service\ServerNotification;

use Firebase\JWT\JWT;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\DtoBuilder\ServerNotification\ServerNotificationDtoBuilder;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Event\ServerNotification\ServerNotificationReceivedEvent;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

readonly class ServerNotificationProcessor implements ServerNotificationProcessorInterface
{
    private string $pathToAppleRootCertificate;

    public function __construct(
        private EventDispatcherInterface     $eventDispatcher,
        private ServerNotificationDtoBuilder $serverNotificationDtoBuilder,
        ParameterBagInterface                $parameterBag,
    )
    {
        $this->pathToAppleRootCertificate = $parameterBag->get('hubar_iap')['path_to_apple_root_certificate'];
    }

    public function process(Request $request): Response
    {
        $signedPayload = json_decode($request->getContent(), true)['signedPayload'];

        $decodedPayload = $this->decodePayload($signedPayload);

        $serverNotificationDto = $this->serverNotificationDtoBuilder->fromArray($decodedPayload);

        $this->eventDispatcher->dispatch(new ServerNotificationReceivedEvent($serverNotificationDto), ServerNotificationReceivedEvent::NAME);

        return new JsonResponse();
    }

    private function decodePayload(string $jwsString): ?array
    {
        $parts = explode('.', $jwsString);

        if (count($parts) !== 3) {
            return null;
        }

        $header = JWT::urlsafeB64Decode($parts[0]);
        $payload = JWT::urlsafeB64Decode($parts[1]);

        $decodedHeader = json_decode($header, true);

        if ($decodedHeader['alg'] !== 'ES256') {
            return null;
        }

        $rootCertificate = file_get_contents($this->pathToAppleRootCertificate);

        $publicKey = openssl_get_publickey($rootCertificate);

        if (false === $publicKey) {
            return null;
        }

        $signature = JWT::urlsafeB64Decode($parts[2]);
        $dataToVerify = $header . '.' . $payload;

        $verification = openssl_verify($dataToVerify, $signature, $publicKey, OPENSSL_ALGO_SHA256);

        if (1 === $verification) {
            return json_decode($payload, true);
        }

        return null;
    }
}