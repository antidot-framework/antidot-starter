<?php

// Load configuration
use Antidot\Container\ContainerBuilder;

$config = require __DIR__ . '/../config/config.php';

// Build container
return ContainerBuilder::build($config, true);