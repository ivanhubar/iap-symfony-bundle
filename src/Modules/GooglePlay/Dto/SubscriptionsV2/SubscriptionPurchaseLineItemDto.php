<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class SubscriptionPurchaseLineItemDto
{
    public function __construct(
        #[Serializer\SerializedName('productId')]
        public string                             $productId,
        #[Serializer\SerializedName('expiryTime')]
        public string                             $expiryTime,
        #[Serializer\SerializedName('plan_type')]
        public AutoRenewingPlanDto|PrepaidPlanDto $planType,
        #[Serializer\SerializedName('offerDetails')]
        public ?OfferDetailsDto                   $offerDetails,
        #[Serializer\SerializedName('deferredItemChange')]
        public ?DeferredItemReplacementDto        $deferredItemChange,
    )
    {
    }
}