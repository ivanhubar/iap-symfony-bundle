<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Exception;

class InvalidGooglePlayBillingResponse extends \Exception
{
    public function __construct(string $message = "invalid_google_play_billing_response", int $code = 500)
    {
        parent::__construct($message, $code);
    }
}