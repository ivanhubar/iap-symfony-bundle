# iap-symfony-bundle
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

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

U can see documentation from apple
here: [Link](https://developer.apple.com/documentation/appstorereceipts/verifyreceipt)

#### Catch Apple Server Notifications

###### Example

```php
<?php

namespace App\API\Modules\Subscription\Apple;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Service\ServerNotification\ServerNotificationProcessorInterface;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[OA\Tag('Endpoints')]
class ServerNotificationApiController extends AbstractFOSRestController
{
    public function __construct(
        private readonly ServerNotificationProcessorInterface $serverNotificationProcessor,
    ) {
    }

    #[Rest\Post('/api/apple/server-notification/v2')]
    #[OA\Post('/api/apple/server-notification/v2', summary: 'API route for Apple Server Notifications')]
    public function __invoke(Request $request): Response
    {
        return $this->serverNotificationProcessor->process($request);
    }
}
```

Then `App\Modules\Subscription\EventSubscriber\Apple\AppleServerNotificationEventSubscriber` will be dispatched

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

`To acknowledge subscription use method acknowledgeSubscription()`

#### Catch Google RTDNs

###### Example

```php
<?php

namespace App\API\Modules\Subscription\Google;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Service\RTDN\RTDNSubscriptionServiceInterface;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

#[OA\Tag(name: 'Endpoints')]
class GoogleRTDNApiController extends AbstractFOSRestController
{
    public function __construct(
        private readonly RTDNSubscriptionServiceInterface $service,
    ) {
    }

    #[Rest\Post(path: '/api/google/rtdn')]
    #[OA\Post(path: '/api/google/rtdn', summary: 'API route for Google Real Time Developer Notifications (RTDNs)')]
    public function __invoke(Request $request): JsonResponse
    {
        return $this->service->processRTDN($request);
    }
}
```

Then `IvanHubar\HubarIAPBundle\Modules\GooglePlay\Event\RTDN\RTDNSubscriptionReceivedEvent` will be dispatched \
\
`To decode Google RTDN use method decodeRTDN`
