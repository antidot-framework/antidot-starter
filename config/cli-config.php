<?php

declare(strict_types=1);

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;

$config = require __DIR__ . '/config.php';
$cliConfig['dependencies'] = $config['console']['dependencies'];
$cacheConfig = [
    'cli_config_cache_path' => 'var/cache/cli-config-cache.php',
];

return (new ConfigAggregator([
    new ArrayProvider($config),
    new ArrayProvider($cliConfig),
    new ArrayProvider($cacheConfig),
], $cacheConfig['cli_config_cache_path']))->getMergedConfig();
