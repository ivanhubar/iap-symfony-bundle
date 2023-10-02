<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

/**
 * @see https://developers.google.com/android-publisher/api-ref/rest/v3/purchases.subscriptionsv2?hl=ru#SubscriptionState
 */
readonly class SubscriptionPurchaseV2Dto
{
    /**
     * @param SubscriptionPurchaseLineItemDto[] $lineItems
     */
    public function __construct(
        public string                        $kind,
        #[Serializer\SerializedName('regionCode')]
        public string                        $regionCode,
        #[Serializer\SerializedName('lineItems')]
        public array                         $lineItems,
        #[Serializer\SerializedName('startTime')]
        public string                        $startTime,
        #[Serializer\SerializedName('subscriptionDate')]
        public string                        $subscriptionState,
        #[Serializer\SerializedName('latestOrderId')]
        public string                        $latestOrderId,
        #[Serializer\SerializedName('linkedPurchaseToken')]
        public string                        $linkedPurchaseToken,
        #[Serializer\SerializedName('pausedStateContext')]
        public ?PausedStateContextDto        $pausedStateContext,
        #[Serializer\SerializedName('canceledStateContext')]
        public ?CanceledStateContextDto      $canceledStateContext,
        #[Serializer\SerializedName('testPurchase')]
        public ?TestPurchaseDto              $testPurchase,
        #[Serializer\SerializedName('acknowledgementState')]
        public string                        $acknowledgementState,
        #[Serializer\SerializedName('externalAccountIdentifiers')]
        public ExternalAccountIdentifiersDto $externalAccountIdentifiers,
        #[Serializer\SerializedName('subscribeWithGoogleInfo')]
        public ?SubscribeWithGoogleInfoDto   $subscribeWithGoogleInfo,
    )
    {
    }
}

