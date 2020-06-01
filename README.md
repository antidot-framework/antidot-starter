Antidot Framework
=================

This framework is based on concepts and components of other open source software, especially [Zend Expressive](https://docs.zendframework.com/zend-expressive/) and [Zend Stratigillity](https://docs.zendframework.com/zend-stratigility/).

## Installation

Install a project using [composer](https://getcomposer.org/download/) package manager:

````bash
composer create-project antidot-fw/antidot-framework-starter project-name
mv project-name/.* project-name/* ./ && rmdir project-name
php -S 127.0.0.1:8000 -t public
````

To run it in dev mode, rename `config/services/dependencies.dev.yaml.dist` to `config/services/dependencies.dev.yaml`

````bash
mv config/services/dependencies.dev.yaml.dist config/services/dependencies.dev.yaml
````

![Default homepage](https://getting-started.antidotfw.io/images/default-homepage.jpg)

Open another console and check the built-in Cli tool

````bash
bin/console
````

![Default console tool](https://getting-started.antidotfw.io/images/default-console.jpg)

#### Disclaimer: 

* This framework is created for educational purposes. The full or partial use of this software is the responsibility of the user.
