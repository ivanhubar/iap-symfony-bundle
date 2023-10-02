<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Service;

use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt\ErrorResponseDto;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt\SuccessResponseDto;

interface ApplePayServiceInterface
{
    public function verifyReceipt(string $receipt, bool $excludeOldTransactions = false, bool $sandbox = false): SuccessResponseDto|ErrorResponseDto;
}