<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\RTDN;

use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN\RTDNDecodedDataDto;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\RTDN\RTDNSubscriptionDto;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Event\RTDN\RTDNSubscriptionReceivedEvent;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

readonly class RTDNSubscriptionService implements RTDNSubscriptionServiceInterface
{
    private SerializerInterface $serializer;

    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
    )
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function processRTDN(Request $request): JsonResponse
    {
        /** @var RTDNSubscriptionDto $rtdnSubscriptionDto */
        $rtdnSubscriptionDto = $this->serializer->deserialize(
            $request->getContent(),
            RTDNSubscriptionDto::class,
            'json'
        );

        $this->eventDispatcher->dispatch(new RTDNSubscriptionReceivedEvent($rtdnSubscriptionDto), RTDNSubscriptionReceivedEvent::NAME);

        return new JsonResponse();
    }

    public function decodeRTDN(RTDNSubscriptionDto $RTDNSubscriptionDto): RTDNDecodedDataDto
    {
        $data = base64_decode($RTDNSubscriptionDto->message->data);

        /** @var RTDNDecodedDataDto $result */
        $result = $this->serializer->deserialize(
            $data,
            RTDNDecodedDataDto::class,
            'json'
        );

        return $result;
    }
}