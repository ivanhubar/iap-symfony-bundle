<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class CancelSurveyResultDto
{
    public function __construct(
        public string $reason,
        #[Serializer\SerializedName('reasonUserInput')]
        public string $reasonUserInput
    )
    {
    }
}