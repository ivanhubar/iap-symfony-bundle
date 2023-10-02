<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Enum;

enum SubscriptionStatusEnum: string
{
    case SUBSCRIPTION_RECOVERED = "A subscription was recovered from account hold.";
    case SUBSCRIPTION_RENEWED = "An active subscription was renewed.";
    case SUBSCRIPTION_CANCELED = "A subscription was either voluntarily or involuntarily cancelled. For voluntary cancellation, sent when the user cancels.";
    case SUBSCRIPTION_PURCHASED = "A new subscription was purchased.";
    case SUBSCRIPTION_ON_HOLD = "A subscription has entered account hold (if enabled).";
    case SUBSCRIPTION_IN_GRACE_PERIOD = "A subscription has entered grace period (if enabled).";
    case SUBSCRIPTION_RESTARTED = "User has restored their subscription from Play > Account > Subscriptions. The subscription was canceled but had not expired yet when the user restores.";
    case SUBSCRIPTION_PRICE_CHANGE_CONFIRMED = "A subscription price change has successfully been confirmed by the user.";
    case SUBSCRIPTION_DEFERRED = "A subscription's recurrence time has been extended.";
    case SUBSCRIPTION_PAUSED = "A subscription has been paused.";
    case SUBSCRIPTION_PAUSE_SCHEDULE_CHANGED = "A subscription pause schedule has been changed.";
    case SUBSCRIPTION_REVOKED = "A subscription has been revoked from the user before the expiration time.";
    case SUBSCRIPTION_EXPIRED = "A subscription has expired.";

    public function fromInt(int $status): ?SubscriptionStatusEnum
    {
        return match ($status) {
            1 => self::SUBSCRIPTION_RECOVERED,
            2 => self::SUBSCRIPTION_RENEWED,
            3 => self::SUBSCRIPTION_CANCELED,
            4 => self::SUBSCRIPTION_PURCHASED,
            5 => self::SUBSCRIPTION_ON_HOLD,
            6 => self::SUBSCRIPTION_IN_GRACE_PERIOD,
            7 => self::SUBSCRIPTION_RESTARTED,
            8 => self::SUBSCRIPTION_PRICE_CHANGE_CONFIRMED,
            9 => self::SUBSCRIPTION_DEFERRED,
            10 => self::SUBSCRIPTION_PAUSED,
            11 => self::SUBSCRIPTION_PAUSE_SCHEDULE_CHANGED,
            12 => self::SUBSCRIPTION_REVOKED,
            13 => self::SUBSCRIPTION_EXPIRED,
            default => null,
        };
    }
}
