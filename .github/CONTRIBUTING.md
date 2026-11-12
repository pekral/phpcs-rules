# Contributing

This package ships **no sniffs of its own**. [`ruleset.xml`](../ruleset.xml) selects and configures sniffs that
[Slevomat Coding Standard](https://github.com/slevomat/coding-standard) already provides. Almost every
contribution is therefore a decision about a single sniff — enable it, exclude it, change its settings, or skip
it for certain paths.

## How the repository is laid out

| Path | Role |
| --- | --- |
| [`ruleset.xml`](../ruleset.xml) | The ruleset that ships. A sniff is either enabled with `<rule ref="…">` or listed with `<exclude name="…">`. |
| [`docs/rules.md`](../docs/rules.md) | Every rule the ruleset enables, with key settings and path exclusions. |
| `Examples/` | Sample code for each rule group. `composer check` runs the ruleset against it. |
| `src/`, `build.php` | Build tooling for `composer check-unused-sniffs`. Not used by the ruleset. |
| `tests/` | PHPUnit tests for the build tooling. |

`composer check-unused-sniffs` walks `vendor/slevomat/coding-standard/SlevomatCodingStandard/Sniffs/`,
collects every Slevomat sniff, and fails if a sniff appears in `ruleset.xml` neither as a `<rule ref>` nor as an
`<exclude name>`.

That guard is the point of the setup: when Slevomat releases new sniffs, CI fails until someone decides about
each one. Nothing is silently skipped.

## Proposing a change

Open an issue first. For a new rule, use the
[New PHPCS Rule Proposal](https://github.com/pekral/phpcs-rules/issues/new?template=new-rule.yml) template.
For a rule that misbehaves, use the
[Bug report](https://github.com/pekral/phpcs-rules/issues/new?template=bug_report.yml) template.

A sniff that crashes or reports correct code as wrong is usually a bug in
[Slevomat Coding Standard itself](https://github.com/slevomat/coding-standard/issues). This repository only
chooses which sniffs run and how they are configured.

## Development setup

```bash
composer install
```

`composer.json` requires PHP `^8.4`. CI runs every check on PHP 8.4 and 8.5.

| Command | What it does |
| --- | --- |
| `composer test` | PHPUnit |
| `composer test:coverage` | PHPUnit with an HTML coverage report in `coverage-report/` |
| `composer check` | PHPCS with this ruleset on `Examples/`, `src/` and `tests/` |
| `composer check-unused-sniffs` | Report Slevomat sniffs that `ruleset.xml` neither enables nor excludes |
| `composer phpstan` | PHPStan on `src/` at level `max` |
| `composer rector` | Rector dry run on `src/` and `tests/` |
| `composer fix` | Apply Rector on `src/` and `tests/`, then `phpcbf` on `Examples/`, `src/` and `tests/` |
| `composer build` | Installs the [pekral/cursor-rules](https://github.com/pekral/cursor-rules) agent rules for Claude, then runs `fix`, `rector`, `check`, `check-unused-sniffs`, `phpstan`, `test`, and `git gone` |

`composer fix` and `composer build` rewrite files in `Examples/`, `src/` and `tests/` in place.

### CI

Pull requests and pushes to `master` run `composer test`, `composer check`, `composer phpstan`,
`composer rector`, and `composer check-unused-sniffs` on PHP 8.4 and 8.5. A scheduled workflow runs
`composer update` every Sunday and opens a pull request when dependencies change; Dependabot also checks
Composer dependencies weekly.

## Pull requests

1. Change `ruleset.xml`: enable the sniff with `<rule ref="…">`, or list it with `<exclude name="…">`.
2. Add or update the matching file in `Examples/`, and the rule's row in `docs/rules.md`.
3. Run `composer build` and make it pass.
4. Add an entry to `CHANGELOG.md` under `## [Unreleased]`.
5. Use [Conventional Commits](https://www.conventionalcommits.org/) — `feat:`, `fix:`, `docs:`, `chore:`.
   Commit subjects are written in English.
6. Open the pull request against `master`.

Enabling, excluding, or reconfiguring a sniff changes what PHPCS reports in every project that uses this
ruleset. Say so in the pull request description, so the release notes can carry it.

## Reporting a security issue

Do not open a public issue. See [SECURITY.md](SECURITY.md).
