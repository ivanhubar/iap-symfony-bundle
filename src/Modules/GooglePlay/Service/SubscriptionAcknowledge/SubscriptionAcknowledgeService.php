<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\SubscriptionAcknowledge;

use GuzzleHttp\Exception\GuzzleException;
use IvanHubar\HubarIAPBundle\Enum\ParameterEnum;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Exception\InvalidGooglePlayBillingResponse;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Factory\ClientFactory;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see https://developers.google.com/android-publisher/api-ref/rest/v3/purchases.subscriptions/acknowledge
 */
readonly class SubscriptionAcknowledgeService
{
    private string $packageName;

    private const ROUTE = "https://androidpublisher.googleapis.com/androidpublisher/v3/applications/%s/purchases/subscriptions/%s/tokens/%s:acknowledge";

    public function __construct(
        private ClientFactory $clientFactory,
        ParameterBagInterface $parameterBag,
    )
    {
        $this->packageName = $parameterBag->get('hubar_iap')[ParameterEnum::GOOGLE_PACKAGE_NAME->value];
    }

    /**
     * @throws GuzzleException
     * @throws InvalidGooglePlayBillingResponse
     */
    public function acknowledgeSubscription(string $subscriptionId, string $token, ?string $developerPayload = null): void
    {
        $this->sendRequest($subscriptionId, $token, $developerPayload);
    }

    /**
     * @throws GuzzleException
     * @throws InvalidGooglePlayBillingResponse
     */
    private function sendRequest(string $subscriptionId, string $token, ?string $developerPayload = null): void
    {
        $client = $this->clientFactory->create();

        $response = $client->post(
            sprintf(self::ROUTE, $this->packageName, $subscriptionId, $token),
            [
                'json' => [
                    'developerPayload' => null === $developerPayload ? "" : $developerPayload,
                ]
            ]);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new InvalidGooglePlayBillingResponse();
        }
    }
}