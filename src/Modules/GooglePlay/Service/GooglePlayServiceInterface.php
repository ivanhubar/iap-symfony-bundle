<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service;

use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2\SubscriptionPurchaseV2Dto;

interface GooglePlayServiceInterface
{
    public function getSubscriptionByPurchaseTokenV2(string $purchaseToken): SubscriptionPurchaseV2Dto;

    public function acknowledgeSubscription(string $subscriptionId, string $token): void;
}