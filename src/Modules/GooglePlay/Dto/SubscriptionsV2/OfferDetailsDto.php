<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class OfferDetailsDto
{
    public function __construct(
        #[Serializer\SerializedName('offerTags')]
        public array   $offerTags,
        #[Serializer\SerializedName('basePlanId')]
        public string  $basePlanId,
        #[Serializer\SerializedName('offerId')]
        public ?string $offerId,
    )
    {
    }
}