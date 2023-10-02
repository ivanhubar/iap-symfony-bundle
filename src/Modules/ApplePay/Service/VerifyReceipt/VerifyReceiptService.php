<?php

namespace IvanHubar\HubarIAPBundle\Modules\ApplePay\Service\VerifyReceipt;

use GuzzleHttp\Exception\GuzzleException;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt\ErrorResponseDto;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Dto\VerifyReceipt\SuccessResponseDto;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\DtoBuilder\VerifyReceipt\SuccessResponseDtoBuilder;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Enum\VerifyReceiptErrorMessageEnum;
use IvanHubar\HubarIAPBundle\Modules\ApplePay\Factory\ClientFactory;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

readonly class VerifyReceiptService
{
    protected const VERIFY_RECEIPT_URI = "/verifyReceipt";

    private string $password;

    public function __construct(
        ParameterBagInterface $parameterBag,
        private SuccessResponseDtoBuilder $successResponseDtoBuilder,
        private ClientFactory $clientFactory,
    )
    {
        $this->password = $parameterBag->get('hubar_iap')['apple_password'];
    }

    /**
     * @throws GuzzleException
     */
    public function verify(string $receipt, bool $excludeOldTransactions = false, bool $sandbox = false): ErrorResponseDto|SuccessResponseDto
    {
        $verifyResponse = $this->sendVerify($receipt, $excludeOldTransactions, $sandbox);

        $validatedStatus = $this->validateStatus($verifyResponse['status']);

        if ($validatedStatus instanceof ErrorResponseDto) {
            return $validatedStatus;
        }

        return $this->successResponseDtoBuilder->fromAppleResponse($verifyResponse);
    }

    private function validateStatus(int $status): ?ErrorResponseDto
    {
        $message = VerifyReceiptErrorMessageEnum::findMessageByStatusCode($status);

        if (null === $message) {
            return new ErrorResponseDto($status, $message);
        }

        return null;
    }

    /**
     * @throws GuzzleException
     */
    private function sendVerify(string $receipt, bool $excludeOldTransactions, bool $sandbox = false): array
    {
        $client = $this->clientFactory->create($sandbox);

        $options = $this->buildRequestOptions($receipt, $excludeOldTransactions);

        $response = $client->post(self::VERIFY_RECEIPT_URI, $options);

        return json_decode($response->getBody(), true);
    }

    private function buildRequestOptions(string $receipt, bool $excludeOldTransactions): array
    {
        return [
            'json' => [
                'receipt-data' => $receipt,
                'password' => $this->password,
                'exclude-old-transactions' => $excludeOldTransactions,
            ]
        ];
    }
}