<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Event\ServerNotification;

use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\ServerNotification\ServerNotificationDto;
use Symfony\Contracts\EventDispatcher\Event;

class ServerNotificationReceivedEvent extends Event
{
    public const NAME = 'hubar_iap.server.notification.received.event';

    public function __construct(
        public readonly ServerNotificationDto $notificationDto,
    )
    {
    }
}