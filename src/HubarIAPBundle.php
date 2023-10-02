<?php

namespace IvanHubar\HubarIAPBundle;

use IvanHubar\HubarIAPBundle\DependencyInjection\IAPExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class HubarIAPBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new IAPExtension();
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}