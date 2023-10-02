<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class MoneyDto
{
    public function __construct(
        #[Serializer\SerializedName('currencyCode')]
        public string $currencyCode,
        public string $units,
        public int    $nanos,
    )
    {
    }
}