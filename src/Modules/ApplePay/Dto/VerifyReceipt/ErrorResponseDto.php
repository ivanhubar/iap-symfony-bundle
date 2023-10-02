<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt;

/**
 * @link https://developer.apple.com/documentation/appstorereceipts/responsebody
 */
readonly class ErrorResponseDto
{
    public function __construct(
        public int $status,
        public string $message,
    )
    {
    }
}