<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class CanceledStateContextDto
{
    public function __construct(
        #[Serializer\SerializedName('cancellation_reason')]
        public UserInitiatedCancellationDto|SystemInitiatedCancellationDto|DeveloperInitiatedCancellationDto|ReplacementCancellationDto|null $cancellationReason,
    )
    {
    }
}