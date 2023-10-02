<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class PausedStateContextDto
{
    public function __construct(
        #[Serializer\SerializedName('autoResumeTime')]
        public string $autoResumeTime,
    ) {
    }
}