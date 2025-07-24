# phpcs-rules

[![Build Status](https://github.com/pekral/phpcs-rules/actions/workflows/phpcs.yml/badge.svg)](https://github.com/pekral/phpcs-rules/actions)
[![Latest Version](https://img.shields.io/packagist/v/pekral/phpcs-rules.svg?style=flat-square)](https://packagist.org/packages/pekral/phpcs-rules)
[![License](https://img.shields.io/github/license/pekral/phpcs-rules.svg?style=flat-square)](LICENSE)
[![Downloads](https://img.shields.io/packagist/dt/pekral/phpcs-rules.svg?style=flat-square)](https://packagist.org/packages/pekral/phpcs-rules)

---

## 🚀 Introduction

**phpcs-rules** is an extensible package of custom rules for [PHP_CodeSniffer (PHPCS)](https://github.com/squizlabs/PHP_CodeSniffer), based on the [Slevomat Coding Standard](https://github.com/slevomat/coding-standard). It helps you maintain consistent code style and high code quality in your PHP projects.

---

## 📦 Installation

```bash
composer require --dev pekral/phpcs-rules
```

---

## ⚙️ Usage

1. Add a `ruleset.xml` file to your project or use the one provided in this package.
2. Run PHPCS with this ruleset:

```bash
vendor/bin/phpcs --standard=vendor/pekral/phpcs-rules/ruleset.xml src/
```

---

## 📝 Usage Examples

### Code check
```bash
vendor/bin/phpcs --standard=vendor/pekral/phpcs-rules/ruleset.xml src/
```

### Automatic fix
```bash
vendor/bin/phpcbf --standard=vendor/pekral/phpcs-rules/ruleset.xml src/
```

### Example configuration (ruleset.xml)
```xml
<?xml version="1.0"?>
<ruleset name="Custom PHPCS Rules">
    <rule ref="vendor/pekral/phpcs-rules/ruleset.xml"/>
    <!-- Your custom rules here -->
</ruleset>
```

---

## ⚙️ Configuration

- Rules can be extended and customized in `ruleset.xml`.
- Supports PHP 8.4+.
- Easy integration with CI/CD (GitHub Actions, GitLab CI, ...).

---

## ❓ FAQ

**Q: How do I add a custom rule?**
A: Add it to your `ruleset.xml` or extend this package.

**Q: How do I run PHPCS only on specific folders?**
A: Adjust the path in the PHPCS command, e.g. `src/`, `app/`.

**Q: How can I contribute?**
A: Open an issue or pull request on GitHub.

---

## 🔗 Further Resources

- [PHP_CodeSniffer (PHPCS)](https://github.com/squizlabs/PHP_CodeSniffer)
- [Slevomat Coding Standard](https://github.com/slevomat/coding-standard)
---

## 📝 License

This package is licensed under the [MIT license](LICENSE).