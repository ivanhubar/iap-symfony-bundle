<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\ServerNotification;

readonly class TransactionInfoDto
{
    public function __construct(
        public string $appAccountToken,
        public string $bundleId,
        public string $environment,
        public int $expiresDate,
        public string $inAppOwnershipType,
        public bool $isUpgraded,
        public string $offerIdentifier,
        public string $offerType,
        public int $originalPurchaseDate,
        public string $originalTransactionId,
        public string $productId,
        public int $purchaseDate,
        public int $quantity,
        public int $revocationDate,
        public string $revocationReason,
        public int $signedDate,
        public string $storefront,
        public string $storefrontId,
        public string $subscriptionGroupIdentifier,
        public string $transactionId,
        public string $transactionReason,
        public string $type,
        public string $webOrderLineItemId
    )
    {
    }
}