<?php

use Aura\Di\ContainerBuilder;
use Antidot\Container\ContainerConfig;

// Load configuration
$config = require __DIR__ . '/../config/cli-config.php';

$builder = new ContainerBuilder();
return $builder->newConfiguredInstance([
    new ContainerConfig($config),
], $builder::AUTO_RESOLVE);
