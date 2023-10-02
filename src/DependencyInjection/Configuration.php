<?php

namespace IvanHubar\HubarIAPBundle\DependencyInjection;

use IvanHubar\HubarIAPBundle\Enum\ParameterEnum;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('hubar_iap');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode(ParameterEnum::APPLE_PASSWORD->value)->end()
                ->scalarNode(ParameterEnum::PATH_TO_APPLE_ROOT_CERTIFICATE->value)->end()
                ->scalarNode(ParameterEnum::APPLE_PRIVATE_KEY_ID->value)->end()
                ->scalarNode(ParameterEnum::APPLE_ISSUER_ID->value)->end()
                ->scalarNode(ParameterEnum::APPLE_BUNDLE_ID->value)->end()
                ->scalarNode(ParameterEnum::APPLE_PRIVATE_KEY->value)->end()
                ->scalarNode(ParameterEnum::GOOGLE_CREDENTIALS_PATH->value)->end()
                ->scalarNode(ParameterEnum::GOOGLE_PACKAGE_NAME->value)->end()
            ->end();

        return $treeBuilder;
    }
}