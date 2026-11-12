# Security Policy

## What this package is

The package a project installs is a PHP_CodeSniffer standard: `ruleset.xml` selects and configures sniffs that
[Slevomat Coding Standard](https://github.com/slevomat/coding-standard) already provides. It ships no sniffs of
its own. The code under `src/` is the build tooling behind `composer check-unused-sniffs`; the ruleset does not
use it. The package is installed with `--dev` and is meant to run in development and CI, not in production.

That shape bounds what a vulnerability here could be. The realistic cases are a malicious change to
`ruleset.xml` (for example a rule reference or setting that makes PHPCS load something it should not), or a
compromised release of one of the two runtime dependencies, `slevomat/coding-standard` and
`dealerdirect/phpcodesniffer-composer-installer`.

## Supported versions

Fixes go into the latest release. Older tags are not patched.

## Reporting a vulnerability

Report privately through GitHub's
[**Report a vulnerability**](https://github.com/pekral/phpcs-rules/security/advisories/new) form, which opens
an advisory visible only to the maintainer.

Include the affected version and the steps to reproduce.

**Do not open a public issue for a vulnerability.** This is a single-maintainer project, so a public report
gives every consumer an exploit before there is a fix.

## Out of scope

- **A vulnerability in a sniff** belongs to
  [Slevomat Coding Standard](https://github.com/slevomat/coding-standard) or
  [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer). This repository only selects which sniffs
  run and how they are configured.
- **A rule that reports or fixes your code incorrectly** is not a vulnerability. Open a regular issue, or report
  it upstream if the sniff itself is wrong.
- **Development dependencies** (PHPUnit, PHPStan, Rector, and the rest of `require-dev`) are not installed in
  projects that require this package.
