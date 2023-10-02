<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Service\ServerNotification;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ServerNotificationProcessorInterface
{
    public function process(Request $request): Response;
}