<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN;

use JMS\Serializer\Annotation as Serializer;

readonly class RTDNDecodedSubscriptionNotificationDto
{
    public function __construct(
        public string $version,
        #[Serializer\SerializedName('notificationType')]
        public int $notificationType,
        #[Serializer\SerializedName('purchaseToken')]
        public string $purchaseToken,
        #[Serializer\SerializedName('subscriptionId')]
        public string $subscriptionId,
    )
    {
    }
}