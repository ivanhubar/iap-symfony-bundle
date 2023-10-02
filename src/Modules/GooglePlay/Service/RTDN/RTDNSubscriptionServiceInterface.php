<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\RTDN;

use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN\RTDNDecodedDataDto;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN\RTDNSubscriptionDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface RTDNSubscriptionServiceInterface
{
    public function processRTDN(Request $request): JsonResponse;

    public function decodeRTDN(RTDNSubscriptionDto $RTDNSubscriptionDto): RTDNDecodedDataDto;
}