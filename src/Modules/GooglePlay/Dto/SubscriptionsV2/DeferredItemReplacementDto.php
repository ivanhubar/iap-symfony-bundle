<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class DeferredItemReplacementDto
{
    public function __construct(
        #[Serializer\SerializedName('productId')]
        public string $productId
    )
    {
    }
}