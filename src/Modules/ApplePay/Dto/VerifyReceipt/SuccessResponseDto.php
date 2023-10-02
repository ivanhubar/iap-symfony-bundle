<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt;

use JMS\Serializer\Annotation as Serializer;

/**
 * @link https://developer.apple.com/documentation/appstorereceipts/responsebody
 */
readonly class SuccessResponseDto
{
    public function __construct(
        #[Serializer\SerializedName('environment')]
        public string $environment,
        #[Serializer\SerializedName('is_retryable')]
        public bool $isRetryable,
        #[Serializer\SerializedName('latest_receipt')]
        public ?string $latestReceipt,
        #[Serializer\SerializedName('latest_receipt_info')]
        public LatestReceiptInfoDto $latestReceiptInfo,
        #[Serializer\SerializedName('pending_renewal_info')]
        public PendingRenewalInfoDto $pendingRenewalInfo,
        #[Serializer\SerializedName('receipt')]
        public ReceiptDto $receipt,
    )
    {
    }
}