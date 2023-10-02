<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Factory;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

readonly class ClientFactory
{
    public const URL = "https://buy.itunes.apple.com";

    public const SANDBOX_URL = "https://sandbox.itunes.apple.com";

    private string $privateKeyId;

    private string $issuerId;

    private string $bundleId;

    private string $privateKey;

    public function __construct(
        ParameterBagInterface $parameterBag,
    )
    {
        $hubarIap = $parameterBag->get('hubar-iap');
        $this->privateKeyId = $hubarIap['apple_private_key_id'];
        $this->issuerId = $hubarIap['apple_issuer_id'];
        $this->bundleId = $hubarIap['apple_bundle_id'];
        $this->privateKey = $hubarIap['apple_private_key'];
    }

    public function create(bool $sandbox = false): Client
    {
        return new Client(
            [
                'base_uri' => $sandbox ? self::SANDBOX_URL : self::URL,
                'headers' => [
                    'Authorization' => sprintf('Bearer %s', $this->generateAuthToken()),
                ],
            ]
        );
    }

    private function generateAuthToken(): string
    {
        $header = [
            "alg" => "ES256",
            "kid" => $this->privateKeyId,
            "typ" => "JWT",
        ];

        $payload = [
            "iss" => $this->issuerId,
            "iat" => (new \DateTime())->getTimestamp(),
            "exp" => (new \DateTime())->modify('+5 minute')->getTimestamp(),
            "aud" => "appstoreconnect-v1",
            "nonce" => Uuid::uuid4()->toString(),
            "bid" => $this->bundleId,
        ];

        return JWT::encode(payload: $payload, key: $this->privateKey, alg: 'ES256', head: $header);
    }
}