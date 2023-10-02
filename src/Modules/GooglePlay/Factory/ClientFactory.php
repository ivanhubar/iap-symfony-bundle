<?php

namespace IvanHubar\HubarIAPBundle\Modules\GooglePlay\Factory;

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use IvanHubar\HubarIAPBundle\Modules\GooglePlay\Enum\ScopeEnum;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

readonly class ClientFactory
{
    private const BASE_URI = "https://www.googleapis.com";
    private const GOOGLE_AUTH = "google_auth";

    private string $googleCredentialsPath;

    public function __construct(
        ParameterBagInterface $parameterBag,
    )
    {
        $this->googleCredentialsPath = $parameterBag->get('hubar_iap')['google_credentials_path'];
    }

    public function create(array $scopes = [ScopeEnum::ANDROID_PUBLISHER->value]): Client
    {
        putenv(sprintf('GOOGLE_APPLICATION_CREDENTIALS=%s', $this->googleCredentialsPath));
        $middleware = ApplicationDefaultCredentials::getMiddleware($scopes);
        $stack = HandlerStack::create();
        $stack->push($middleware);

        return new Client([
            'handler' => $stack,
            'base_uri' => static::BASE_URI,
            'auth' => static::GOOGLE_AUTH,
        ]);
    }
}