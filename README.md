# phpcs-rules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pekral/phpcs-rules.svg?style=flat-square)](https://packagist.org/packages/pekral/phpcs-rules)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
![CI](https://github.com/pekral/phpcs-rules/workflows/CI/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/pekral/phpcs-rules.svg?style=flat-square)](https://packagist.org/packages/pekral/phpcs-rules)

A ready-made ruleset for [PHP_CodeSniffer (PHPCS)](https://github.com/squizlabs/PHP_CodeSniffer) built on the [Slevomat Coding Standard](https://github.com/slevomat/coding-standard). It enables around 160 rules for arrays, classes, comments, control structures, namespaces, type hints, whitespace and more, so PHP projects get one consistent code style from a single `ruleset.xml`.

## Requirements

- PHP 8.4 or newer. The latest tagged release, 0.5.0, still requires PHP 8.5; PHP 8.4 support returns with the next release (see [CHANGELOG](CHANGELOG.md)).
- Composer.

`slevomat/coding-standard` and `dealerdirect/phpcodesniffer-composer-installer` are installed with the package.

## Installation

```bash
composer require --dev pekral/phpcs-rules
```

## Configuration

No configuration is needed: pass the shipped ruleset to PHPCS with `--standard`. To add or override rules, reference it from a `ruleset.xml` in your project and run PHPCS with `--standard=ruleset.xml`:

```xml
<?xml version="1.0"?>
<ruleset name="Custom PHPCS Rules">
    <rule ref="vendor/pekral/phpcs-rules/ruleset.xml"/>
    <!-- Your custom rules here -->
</ruleset>
```

## Quick start

Check a directory:

```bash
vendor/bin/phpcs --standard=vendor/pekral/phpcs-rules/ruleset.xml src/
```

Fix what can be fixed automatically:

```bash
vendor/bin/phpcbf --standard=vendor/pekral/phpcs-rules/ruleset.xml src/
```

> [!WARNING]
> `phpcbf` rewrites files in place. Commit or back up your changes before running it.

The ruleset checks only `.php` files and turns some rules off for certain paths, for example `tests/*` for `ClassLength`, `FileLength` and `StaticClosure`.

## Documentation

- [Rules](docs/rules.md): every rule the ruleset enables, with key settings and path exclusions.

## Testing

```bash
composer test
composer check
```

`composer test` runs PHPUnit; `composer check` runs PHPCS with this ruleset on `Examples/`, `src/` and `tests/`. CI also runs PHPStan, Rector in dry-run mode and `composer check-unused-sniffs` on PHP 8.4 and 8.5.

## Changelog

See [CHANGELOG](CHANGELOG.md).

## License

The MIT License (MIT). See [LICENSE](LICENSE).
