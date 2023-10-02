<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class ExternalAccountIdentifiersDto
{
    public function __construct(
        #[Serializer\SerializedName('externalAccountId')]
        public string $externalAccountId,
        #[Serializer\SerializedName('obfuscatedExternalAccountId')]
        public string $obfuscatedExternalAccountId,
        #[Serializer\SerializedName('obfuscatedExternalProfileId')]
        public string $obfuscatedExternalProfileId,
    )
    {
    }
}