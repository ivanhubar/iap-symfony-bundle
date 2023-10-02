<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class UserInitiatedCancellationDto
{
    public function __construct(
        #[Serializer\SerializedName('cancelSurveyResult')]
        public CancelSurveyResultDto $cancelSurveyResult,
        #[Serializer\SerializedName('cancelTime')]
        public string                $cancelTime
    )
    {
    }
}