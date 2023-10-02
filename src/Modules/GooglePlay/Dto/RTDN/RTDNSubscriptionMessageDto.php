<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN;

use JMS\Serializer\Annotation as Serializer;

readonly class RTDNSubscriptionMessageDto
{
    public function __construct(
        public string $data,
        #[Serializer\SerializedName('messageId')]
        public string $messageId,
        public ?array $attributes = null,
    )
    {
    }
}