<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\SubscriptionsV2;

use GuzzleHttp\Exception\GuzzleException;
use IvanHubar\HubarIAPBundle\Enum\ParameterEnum;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2\SubscriptionPurchaseV2Dto;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Factory\ClientFactory;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

readonly class SubscriptionsV2Service
{
    private string $packageName;

    private const VERIFY_ROUTE = "https://androidpublisher.googleapis.com/androidpublisher/v3/applications/%s/purchases/subscriptionsv2/tokens/%s";

    private SerializerInterface $serializer;

    public function __construct(
        private ClientFactory $clientFactory,
        ParameterBagInterface $parameterBag,
    )
    {
        $this->packageName = $parameterBag->get('hubar_iap')[ParameterEnum::GOOGLE_PACKAGE_NAME->value];
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $purchaseToken): SubscriptionPurchaseV2Dto
    {
        /** @var SubscriptionPurchaseV2Dto $subscriptionPurchaseV2Dto */
        $subscriptionPurchaseV2Dto = $this->serializer->deserialize(
            $this->sendRequest($purchaseToken),
            SubscriptionPurchaseV2Dto::class,
            'json'
        );

        return $subscriptionPurchaseV2Dto;
    }

    /**
     * @throws GuzzleException
     */
    private function sendRequest(string $purchaseToken): string
    {
        $client = $this->clientFactory->create();

        $response = $client->get(sprintf(self::VERIFY_ROUTE, $this->packageName, $purchaseToken));

        return $response->getBody();
    }
}