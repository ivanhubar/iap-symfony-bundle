<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Enum;

enum VerifyReceiptErrorMessageEnum: string
{
    case INVALID_METHOD = "The request to the App Store didn’t use the HTTP POST request method.";
    case NO_LONGER_SENT_THIS_STATUS_CODE = "The App Store no longer sends this status code.";
    case TEMPORARY_ISSUE = "The data in the receipt-data property is malformed or the service experienced a temporary issue. Try again.";
    case COULD_NOT_AUTHENTICATE_RECEIPT = "The system couldn’t authenticate the receipt.";
    case NOT_MATCH_SHARED_SECRET = "The shared secret you provided doesn’t match the shared secret on file for your account.";
    case UNABLE_TO_PROVIDE_RECEIPT = "The receipt server was temporarily unable to provide the receipt. Try again.";
    case EXPIRES_SUBSCRIPTION = "This receipt is valid, but the subscription is in an expired state. When your server receives this status code, the system also decodes and returns receipt data as part of the response. This status only returns for iOS 6-style transaction receipts for auto-renewable subscriptions.";
    case TEST_RECEIPT_TO_PROD_ENVIRONMENT = "This receipt is from the test environment, but you sent it to the production environment for verification.";
    case PROD_RECEIPT_TO_TEST_ENVIRONMENT = "This receipt is from the production environment, but you sent it to the test environment for verification.";
    case INTERNAL_ERROR = "Internal data access error. Try again later.";
    case CAN_NOT_FIND_ACCOUNT = "The system can’t find the user account or the user account has been deleted.";
    case INTERNAL_DATA_ACCESS_ERROR = "Internal error";

    /**
     * Returns null, if no error
     *
     * @param int $code
     * @return string|null
     */
    public static function findMessageByStatusCode(int $code): ?string
    {
        return match ($code) {
            21000 => self::INVALID_METHOD->value,
            21001 => self::NO_LONGER_SENT_THIS_STATUS_CODE->value,
            21002 => self::TEMPORARY_ISSUE,
            21003 => self::COULD_NOT_AUTHENTICATE_RECEIPT,
            21004 => self::NOT_MATCH_SHARED_SECRET,
            21005 => self::UNABLE_TO_PROVIDE_RECEIPT,
            21006 => self::EXPIRES_SUBSCRIPTION,
            21007 => self::TEST_RECEIPT_TO_PROD_ENVIRONMENT,
            21008 => self::PROD_RECEIPT_TO_TEST_ENVIRONMENT,
            21009 => self::INTERNAL_ERROR,
            21010 => self::CAN_NOT_FIND_ACCOUNT,
            0 => null,
            default => self::INTERNAL_DATA_ACCESS_ERROR,
        };
    }
}
