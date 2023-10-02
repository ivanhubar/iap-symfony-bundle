# iap-symfony-bundle

###### A Symfony Bundle for simple integration of Payment subscription by ApplePay and GooglePlay Billing

## Installation
Use composer: \
`composer require ivanhubar/iap-symfony-bundle`

## How to use

### ApplePay
#### Verify subscription by receipt
```php
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Service\ApplePayServiceInterface;

readonly class ExampleService
{
    // Autowire Apple Pay service for verify
    public function __construct(
        private ApplePayServiceInterface $applePayService,
    )
    {
    }

    public function verify(string $receipt)
    {
        $response = $this->applePayService->verifyReceipt($receipt);
        // Do something with response from Apple
    }
}
```
U can see documentation from apple here: [Link](https://developer.apple.com/documentation/appstorereceipts/verifyreceipt)

### GooglePlayBilling 
#### Get response by purchaseToken
```php
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\GooglePlayServiceInterface;

readonly class ExampleService
{
    public function __construct(
        private GooglePlayServiceInterface $googlePlayService,
    )
    {
    }

    public function get(string $purchaseToken)
    {
        $response = $this->googlePlayService->getSubscriptionByPurchaseTokenV2($purchaseToken);
    }
}
```
