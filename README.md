Fork of h4cc/phpqatools 
==========

This is a composer meta package for installing PHP Quality Assurance Tools with only one dependency.
Only stable packages are used, to keep the configuration easy and secure.

Included in this package are:
- PHPUnit
- PHP-Invoker
- DbUnit
- PHPLOC
- PHPCPD
- PHP_Depend
- PHPMD
- PHP_CodeSniffer
- Fabien Potencier/PHP Coding Standards Fixer
- Sensiolabs/Security-Checker
- Behat
- PHPStan
- Phan


# Usage

The installed tools are available in vendor/bin/ and can be started like this:

```bash
php vendor/bin/phpmd
```

# Installation

To use this package, add it as as "dev" dependency with this command:

```bash
composer require cwerner1/phpqatools --dev
```

Or modify your composer.json as followed:

```json
require-dev: {
  "cwerner1/phpqatools": "*"
}
```

More info about development dependencies: http://getcomposer.org/doc/04-schema.md#require-dev


