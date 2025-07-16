# phpcs-rules

Custom ruleset for [PHP_CodeSniffer (PHPCS)](https://github.com/squizlabs/PHP_CodeSniffer) with extended rules and configuration based on the [Slevomat Coding Standard](https://github.com/slevomat/coding-standard). Helps you maintain consistent code style and high code quality in your PHP projects.

## 🚀 Installation

```bash
composer require --dev pekral/phpcs-rules
```

## ⚙️ Usage

1. Add a `ruleset.xml` file to your project or use the one provided in this package.
2. Run PHPCS with this ruleset:

```bash
vendor/bin/phpcs --standard=vendor/pekral/phpcs-rules/ruleset.xml src/
```

## 📝 Example configuration (ruleset.xml)

```xml
<?xml version="1.0"?>
<ruleset name="Custom PHPCS Rules">
    <rule ref="vendor/pekral/phpcs-rules/ruleset.xml"/>
    <!-- Your custom rules here -->
</ruleset>
```

## 💡 Why use this package?
- Custom rules for your team or project
- Easy integration with CI/CD
- Based on the proven Slevomat Coding Standard
- Supports PHP 8.4+