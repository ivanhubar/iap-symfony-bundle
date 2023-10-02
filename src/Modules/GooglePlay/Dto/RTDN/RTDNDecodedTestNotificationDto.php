<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN;

readonly class RTDNDecodedTestNotificationDto
{
    public function __construct(
        public string $version,
    )
    {
    }
}