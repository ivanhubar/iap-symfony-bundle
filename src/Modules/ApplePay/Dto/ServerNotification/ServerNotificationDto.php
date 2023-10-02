<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\ServerNotification;

use JMS\Serializer\Annotation as Serializer;

readonly class ServerNotificationDto
{
    public function __construct(
        #[Serializer\SerializedName('notificationType')]
        public string $notificationType,
        #[Serializer\SerializedName('subtype')]
        public ?string $subtype,
        public DataDto $data,
        public string $version,
        #[Serializer\SerializedName('signedDate')]
        public string $signedDate,
        #[Serializer\SerializedName('notificationUUID')]
        public string $notificationUUID,
    )
    {
    }
}