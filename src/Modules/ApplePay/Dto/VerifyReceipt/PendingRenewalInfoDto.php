<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt;

use JMS\Serializer\Annotation as Serializer;

readonly class PendingRenewalInfoDto
{
    public function __construct(
        #[Serializer\SerializedName('auto_renew_product_id')]
        public string $autoRenewProductId,
        #[Serializer\SerializedName('auto_renew_status')]
        public string $autoRenewStatus,
        #[Serializer\SerializedName('expiration_intent')]
        public string $expirationIntent,
        #[Serializer\SerializedName('grace_period_expires_date')]
        public string $gracePeriodExpiresDate,
        #[Serializer\SerializedName('grace_period_expires_date_ms')]
        public string $gracePeriodExpiresDateMs,
        #[Serializer\SerializedName('grace_period_expires_date_pst')]
        public string $gracePeriodExpiresDatePst,
        #[Serializer\SerializedName('is_in_billing_retry_period')]
        public string $isInBillingRetryPeriod,
        #[Serializer\SerializedName('offer_code_ref_name')]
        public string $offerCodeRefName,
        #[Serializer\SerializedName('original_transaction_id')]
        public string $originalTransactionId,
        #[Serializer\SerializedName('price_consent_status')]
        public string $priceConsentStatus,
        #[Serializer\SerializedName('product_id')]
        public string $productId,
        #[Serializer\SerializedName('promotional_offer_id')]
        public string $promotionalOfferId,
        #[Serializer\SerializedName('price_increase_status')]
        public string $priceIncreaseStatus
    )
    {
    }
}