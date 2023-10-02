<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class AutoRenewingPlanDto
{
    public function __construct(
        #[Serializer\SerializedName('autoRenewEnabled')]
        public bool                                  $autoRenewEnabled,
        #[Serializer\SerializedName('autoRenewEnabled')]
        public ?SubscriptionItemPriceChangeDetailsDto $priceChangeDetails
    )
    {
    }
}