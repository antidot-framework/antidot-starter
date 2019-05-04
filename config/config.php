<?php

declare(strict_types=1);

use Antidot\SymfonyConfigTranslator\Container\Config\ConfigAggregator;
use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\PhpFileProvider;
use Zend\ConfigAggregator\ZendConfigProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'var/cache/config-cache.php',
];

$aggregator = new ConfigAggregator([
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
    new ZendConfigProvider(realpath(__DIR__).'/services/{{,*.}prod,{,*.}local,{,*.}dev}.yaml'),
    new ArrayProvider($cacheConfig),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
