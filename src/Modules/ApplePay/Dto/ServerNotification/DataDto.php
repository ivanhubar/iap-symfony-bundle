<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\ServerNotification;

use JMS\Serializer\Annotation as Serializer;

readonly class DataDto
{
    public function __construct(
        public string $environment,
        #[Serializer\SerializedName('signedRenewalInfo')]
        public ?RenewalInfoDto $signedRenewalInfo,
        #[Serializer\SerializedName('signedTransactionInfo')]
        public ?TransactionInfoDto $signedTransactionInfo,
        public int $status,
    )
    {
    }
}