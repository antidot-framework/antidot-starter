<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;

$config = require __DIR__ . '/config.php';
$cliConfig['services'] = $config['console']['services'] ?? [];
$cliConfig['factories'] = $config['console']['factories'] ?? [];
$cacheConfig = [
    'cli_config_cache_path' => 'var/cache/cli-config-cache.php',
];

return (new ConfigAggregator([
    new ArrayProvider($config),
    new ArrayProvider($cliConfig),
    new ArrayProvider($cacheConfig),
], $cacheConfig['cli_config_cache_path']))->getMergedConfig();
