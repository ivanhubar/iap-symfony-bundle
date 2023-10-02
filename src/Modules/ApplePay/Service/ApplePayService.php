<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Service;

use GuzzleHttp\Exception\GuzzleException;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt\ErrorResponseDto;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt\SuccessResponseDto;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Service\VerifyReceipt\VerifyReceiptService;

readonly class ApplePayService implements ApplePayServiceInterface
{
    public function __construct(
        private VerifyReceiptService $verifyReceiptService,
    )
    {
    }

    /**
     * @throws GuzzleException
     */
    public function verifyReceipt(string $receipt, bool $excludeOldTransactions = false, bool $sandbox = false): ErrorResponseDto|SuccessResponseDto
    {
        return $this->verifyReceiptService->verify($receipt, $excludeOldTransactions, $sandbox);
    }
}