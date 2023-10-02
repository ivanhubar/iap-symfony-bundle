<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class PrepaidPlanDto
{
    public function __construct(
        #[Serializer\SerializedName('allowExtendAfterTime')]
        public string $allowExtendAfterTime,
    )
    {
    }
}