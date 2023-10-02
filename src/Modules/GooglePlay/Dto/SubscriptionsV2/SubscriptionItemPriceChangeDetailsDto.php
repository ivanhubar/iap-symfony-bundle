<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class SubscriptionItemPriceChangeDetailsDto
{
    public function __construct(
        #[Serializer\SerializedName('newPrice')]
        public MoneyDto $newPrice,
        #[Serializer\SerializedName('priceChangeMode')]
        public string   $priceChangeMode,
        #[Serializer\SerializedName('priceChangeState')]
        public string   $priceChangeState,
        #[Serializer\SerializedName('expectedNewPriceChargeTime')]
        public string   $expectedNewPriceChargeTime,
    )
    {
    }
}