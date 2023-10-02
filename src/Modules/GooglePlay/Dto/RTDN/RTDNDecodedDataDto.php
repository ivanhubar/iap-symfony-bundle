<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN;

use JMS\Serializer\Annotation as Serializer;

readonly class RTDNDecodedDataDto
{
    public function __construct(
        public string $version,
        #[Serializer\SerializedName('packageName')]
        public string $packageName,
        #[Serializer\SerializedName('eventTimeMillis')]
        public int $eventTimeMillis,
        #[Serializer\SerializedName('subscriptionNotification')]
        public ?RTDNDecodedSubscriptionNotificationDto $subscriptionNotification = null,
        #[Serializer\SerializedName('testNotification')]
        public ?RTDNDecodedTestNotificationDto $testNotification = null,
    )
    {
    }
}