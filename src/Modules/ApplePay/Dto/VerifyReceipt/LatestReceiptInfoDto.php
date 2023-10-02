<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt;

use JMS\Serializer\Annotation as Serializer;

readonly class LatestReceiptInfoDto
{
    public function __construct(
        #[Serializer\SerializedName('app_account_token')]
        public string $appAccountToken,
        #[Serializer\SerializedName('cancellation_date')]
        public string $cancellationDate,
        #[Serializer\SerializedName('cancellation_date_ms')]
        public string $cancellationDateMs,
        #[Serializer\SerializedName('cancellation_date_pst')]
        public string $cancellationDatePst,
        #[Serializer\SerializedName('cancellation_reason')]
        public string $cancellationReason,
        #[Serializer\SerializedName('expires_date')]
        public string $expiresDate,
        #[Serializer\SerializedName('expires_date_ms')]
        public string $expiresDateMs,
        #[Serializer\SerializedName('expires_date_pst')]
        public string $expiresDatePst,
        #[Serializer\SerializedName('in_app_ownership_type')]
        public string $inAppOwnershipType,
        #[Serializer\SerializedName('is_in_intro_offered_period')]
        public string $isInIntroOfferPeriod,
        #[Serializer\SerializedName('is_trial_period')]
        public string $isTrialPeriod,
        #[Serializer\SerializedName('is_upgraded')]
        public string $isUpgraded,
        #[Serializer\SerializedName('offer_code_ref_name')]
        public string $offerCodeRefName,
        #[Serializer\SerializedName('original_purchase_date')]
        public string $originalPurchaseDate,
        #[Serializer\SerializedName('original_purchase_date_ms')]
        public string $originalPurchaseDateMs,
        #[Serializer\SerializedName('original_purchase_date_pst')]
        public string $originalPurchaseDatePst,
        #[Serializer\SerializedName('original_transaction_id')]
        public string $originalTransactionId,
        #[Serializer\SerializedName('product_id')]
        public string $productId,
        #[Serializer\SerializedName('promotional_offer_id')]
        public string $promotionalOfferId,
        #[Serializer\SerializedName('purchase_date')]
        public string $purchaseDate,
        #[Serializer\SerializedName('purchase_date_ms')]
        public string $purchaseDateMs,
        #[Serializer\SerializedName('purchase_date_pst')]
        public string $purchaseDatePst,
        #[Serializer\SerializedName('quantity')]
        public string $quantity,
        #[Serializer\SerializedName('subscription_group_identifier')]
        public string $subscriptionGroupIdentifier,
        #[Serializer\SerializedName('web_order_line_item_id')]
        public string $webOrderLineItemId,
        #[Serializer\SerializedName('transaction_id')]
        public string $transactionId
    )
    {
    }
}