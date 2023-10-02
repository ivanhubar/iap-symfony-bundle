<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Event\RTDN;

use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN\RTDNSubscriptionDto;
use Symfony\Contracts\EventDispatcher\Event;

class RTDNSubscriptionReceivedEvent extends Event
{
    public const NAME = 'hubar_iap.rtdn.subscription.received.event';

    public function __construct(
        public readonly RTDNSubscriptionDto $subscriptionDto,
    )
    {
    }
}