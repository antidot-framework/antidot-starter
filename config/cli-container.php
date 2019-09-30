<?php

// Load configuration
use Antidot\Container\ContainerBuilder;

$config = require __DIR__ . '/../config/cli-config.php';

return ContainerBuilder::build($config, true);