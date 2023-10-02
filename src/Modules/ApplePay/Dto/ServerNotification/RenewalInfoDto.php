<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\ServerNotification;

readonly class RenewalInfoDto
{
    public function __construct(
        public string $autoRenewProductId,
        public string $autoRenewStatus,
        public string $environment,
        public string $expirationIntent,
        public string $gracePeriodExpiresDate,
        public bool $isInBillingRetryPeriod,
        public string $offerIdentifier,
        public string $offerType,
        public string $originalTransactionId,
        public string $priceIncreaseStatus,
        public string $productId,
        public string $recentSubscriptionStartDate,
        public int $renewalDate,
        public int $signedDate
    )
    {
    }
}