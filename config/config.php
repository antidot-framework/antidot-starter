<?php

declare(strict_types=1);

use Antidot\DevTools\Container\Config\ConfigProvider as DevToolsConfigProvider;
use Antidot\SymfonyConfigTranslator\Container\Config\ConfigAggregator;
use Antidot\Yaml\YamlConfigProvider;
use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'var/cache/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \Antidot\Framework\Config\ConfigProvider::class,
    \Antidot\Runtime\Config\ConfigProvider::class,
    \WShafer\PSR11MonoLog\ConfigProvider::class,
    \Antidot\Logger\Container\Config\ConfigProvider::class,
    \Antidot\Event\Container\Config\ConfigProvider::class,
    \Antidot\Cli\Container\Config\ConfigProvider::class,
    class_exists(DevToolsConfigProvider::class) ? DevToolsConfigProvider::class : fn() => [],
    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `*.php`
    //   - `*.global.php`
    //   - `*.local.php`
    //   - `*.dev.php`
    //   - `*.yaml`
    //   - `*.global.yaml`
    //   - `*.local.yaml`
    //   - `*.dev.yaml`
    new PhpFileProvider(realpath(__DIR__).'/services/{{,*.}prod,{,*.}local,{,*.}dev}.php'),
    new YamlConfigProvider(realpath(__DIR__).'/services/{{,*.}prod,{,*.}local,{,*.}dev}.yaml'),
    new ArrayProvider($cacheConfig),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
