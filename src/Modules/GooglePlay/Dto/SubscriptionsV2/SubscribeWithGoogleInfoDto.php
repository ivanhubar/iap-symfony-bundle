<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Dto\SubscriptionsV2;

use JMS\Serializer\Annotation as Serializer;

readonly class SubscribeWithGoogleInfoDto
{
    public function __construct(
        #[Serializer\SerializedName('profileId')]
        public string $profileId,
        #[Serializer\SerializedName('profileName')]
        public string $profileName,
        #[Serializer\SerializedName('emailAddress')]
        public string $emailAddress,
        #[Serializer\SerializedName('givenName')]
        public string $givenName,
        #[Serializer\SerializedName('familyName')]
        public string $familyName,
    )
    {
    }
}