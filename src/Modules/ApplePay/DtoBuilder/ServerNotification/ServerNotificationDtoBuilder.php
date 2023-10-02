<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\DtoBuilder\ServerNotification;

use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\ServerNotification\ServerNotificationDto;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

readonly class ServerNotificationDtoBuilder
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function fromArray(array $data): ServerNotificationDto
    {
        return $this->serializer->deserialize(
            json_encode($data),
            ServerNotificationDto::class,
            'json'
        );
    }
}