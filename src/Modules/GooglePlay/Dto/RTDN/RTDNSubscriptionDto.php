<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN;

readonly class RTDNSubscriptionDto
{
    public function __construct(
        public RTDNSubscriptionMessageDto $message,
        public string $subscription,
    )
    {
    }
}