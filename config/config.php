<?php

declare(strict_types=1);

use Antidot\SymfonyConfigTranslator\Container\Config\ConfigTranslator;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;
use Zend\ConfigAggregator\ZendConfigProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'var/cache/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \Zend\Expressive\Router\AuraRouter\ConfigProvider::class,
    \Zend\Expressive\Helper\ConfigProvider::class,
    \Zend\Expressive\Router\ConfigProvider::class,
    \WShafer\PSR11MonoLog\ConfigProvider::class,
    \Antidot\Logger\Container\Config\ConfigProvider::class,
    \Antidot\Container\Config\ConfigProvider::class,
    \Zend\HttpHandlerRunner\ConfigProvider::class,
    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}prod,{,*.}local,{,*.}dev}.php'),
    new ZendConfigProvider(realpath(__DIR__) . '/autoload/{{,*.}prod,{,*.}local,{,*.}dev}.yaml'),
    // Load development config if it exists
    new PhpFileProvider(realpath(__DIR__) . '/development.config.php'),
], $cacheConfig['config_cache_path']);
return (new ConfigTranslator())($aggregator->getMergedConfig());
