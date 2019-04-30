<?php

use Aura\Di\ContainerBuilder;
use Antidot\Aura\Container\Config\ContainerConfig;

// Load configuration
$config = require __DIR__ . '/../config/config.php';

// Build container
$builder = new ContainerBuilder();
return $builder->newConfiguredInstance([
    new ContainerConfig(\is_array($config) ? $config : []),
], $builder::AUTO_RESOLVE);
