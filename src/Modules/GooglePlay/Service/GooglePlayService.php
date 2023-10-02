<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service;

use GuzzleHttp\Exception\GuzzleException;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2\SubscriptionPurchaseV2Dto;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Exception\InvalidGooglePlayBillingResponse;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\SubscriptionAcknowledge\SubscriptionAcknowledgeService;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\SubscriptionsV2\SubscriptionsV2Service;

readonly class GooglePlayService implements GooglePlayServiceInterface
{
    public function __construct(
        private SubscriptionsV2Service $subscriptionsV2Service,
        private SubscriptionAcknowledgeService $subscriptionAcknowledgeService,
    )
    {
    }

    /**
     * @throws GuzzleException
     */
    public function getSubscriptionByPurchaseTokenV2(string $purchaseToken): SubscriptionPurchaseV2Dto
    {
        return $this->subscriptionsV2Service->get($purchaseToken);
    }

    /**
     * @throws GuzzleException
     * @throws InvalidGooglePlayBillingResponse
     */
    public function acknowledgeSubscription(string $subscriptionId, string $token, ?string $developerPayload = null): void
    {
        $this->subscriptionAcknowledgeService->acknowledgeSubscription($subscriptionId, $token, $developerPayload);
    }
}