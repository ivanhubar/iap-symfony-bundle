<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt;

use JMS\Serializer\Annotation as Serializer;

readonly class ReceiptDto
{
    public function __construct(
        #[Serializer\SerializedName('adam_id')]
        public int    $adamId,
        #[Serializer\SerializedName('app_item_id')]
        public int    $appItemId,
        #[Serializer\SerializedName('application_version')]
        public string $applicationVersion,
        #[Serializer\SerializedName('bundle_id')]
        public string $bundleId,
        #[Serializer\SerializedName('download_id')]
        public int    $downloadId,
        #[Serializer\SerializedName('expiration_date')]
        public string $expirationDate,
        #[Serializer\SerializedName('expiration_date_ms')]
        public string $expirationDateMs,
        #[Serializer\SerializedName('expiration_date_pst')]
        public string $expirationDatePst,
        #[Serializer\SerializedName('in_app')]
        public array  $inApp,
        #[Serializer\SerializedName('original_application_version')]
        public string $originalApplicationVersion,
        #[Serializer\SerializedName('original_purchase_date')]
        public string $originalPurchaseDate,
        #[Serializer\SerializedName('original_purchase_date_ms')]
        public string $originalPurchaseDateMs,
        #[Serializer\SerializedName('original_purchase_date_pst')]
        public string $originalPurchaseDatePst,
        #[Serializer\SerializedName('preorder_date')]
        public string $preorderDate,
        #[Serializer\SerializedName('preorder_date_ms')]
        public string $preorderDateMs,
        #[Serializer\SerializedName('preorder_date_pst')]
        public string $preorderDatePst,
        #[Serializer\SerializedName('receipt_creation_date')]
        public string $receiptCreationDate,
        #[Serializer\SerializedName('receipt_creation_date_ms')]
        public string $receiptCreationDateMs,
        #[Serializer\SerializedName('receipt_creation_date_pst')]
        public string $receiptCreationDatePst,
        #[Serializer\SerializedName('receipt_type')]
        public string $receiptType,
        #[Serializer\SerializedName('receipt_date')]
        public string $requestDate,
        #[Serializer\SerializedName('receipt_date_ms')]
        public string $requestDateMs,
        #[Serializer\SerializedName('receipt_date_pst')]
        public string $requestDatePst,
        #[Serializer\SerializedName('version_external_identifier')]
        public int    $versionExternalIdentifier
    )
    {
    }
}