# Antidot Framework

PHP full featured framework designed to allow you creating 100% framework agnostic code.

## Key Features

* **Preconfigured Coding Style**: [Psr-1](https://www.php-fig.org/psr/psr-1) and [Psr-2](https://www.php-fig.org/psr/psr-2) code sniffer to help to respect standard
* **Logger**: [Psr-3](https://www.php-fig.org/psr/psr-3) implementation by [wshafer/monolog](https://github.com/wshafer/psr11-monolog)
* **Auto-loading**: [Psr-4](https://www.php-fig.org/psr/psr-4) Namespaces auto-loading
* **Request Response Lifecycle**: [Psr-7](https://www.php-fig.org/psr/psr-7) Request and responses using [Laminas Diactoros](https://docs.laminas.dev/laminas-diactoros/)
* **Auto-wired Dependency injection**: [Psr-11](https://www.php-fig.org/psr/psr-11) Auto-wired dependency injection container
* **Event Dispatcher**: [Psr-14](https://www.php-fig.org/psr/psr-14) Event dispatching system
* **Request pipeline**: [Psr-15](https://www.php-fig.org/psr/psr-15) Request handler and Middleware
* **Pipeline based router**: Intuitive to use route system
* **Different Config Translators**: [Laminas config](https://docs.laminas.dev/laminas-config/) style or [Symfony](https://symfony.com/doc/current/best_practices/configuration.html) style
* **Cli**: Ready to use Console Line Tool on top of [Symfony Console Tool](https://symfony.com/doc/current/components/console.html)


## Quick Start

```bash
composer create-project antidot-fw/antidot-framework-starter project-name
cd project-name
XDEBUG_MODE=off bin/console serve # runs Async server with XDebug disabled for better performance
php -S 127.0.0.1:8000 -t public # runs Sync server nice for testing
```

Read the [Getting started](https://antidotfw.io/#/framework/getting-started) guide in the docs site.

## Special thanks & Sponsors

* **JetBrains:** Thanks for supporting us with the All Products Pack License for Open Source

<a href="https://www.jetbrains.com/?from=antidot-framework" target="_blank">
    <img alt="JetBrains" width="200" src="https://antidotfw.io/images/jetbrains-variant-4.png" style="width:263px !important;height:147px !important"/>
</a>

###### Disclaimer: 

* This framework is based on concepts and components of other open source software, especially [Laminas Request Handler Runner](https://docs.laminas.dev/laminas-httphandlerrunner/), [Mezzio](https://docs.mezzio.dev/mezzio/) and [Laminas API tools legacy Zend Stratigillity](https://api-tools.getlaminas.org/).
* The full or partial use of this software is the responsibility of the user.
