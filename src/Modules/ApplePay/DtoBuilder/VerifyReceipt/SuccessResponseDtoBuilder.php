<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\DtoBuilder\VerifyReceipt;

use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt\SuccessResponseDto;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

readonly class SuccessResponseDtoBuilder
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function fromAppleResponse(array $response): SuccessResponseDto
    {
        return $this->serializer->deserialize(
            json_encode($response),
            SuccessResponseDto::class,
            'json'
        );
    }
}
