# php-project-48

[![Actions Status](https://github.com/LeyRo-cpu/php-project-48/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/LeyRo-cpu/php-project-48/actions)
[![CI](https://github.com/LeyRo-cpu/php-project-48/actions/workflows/ci.yml/badge.svg)](https://github.com/LeyRo-cpu/php-project-48/actions)
[![Maintainability](https://sonarcloud.io/api/project_badges/measure?project=LeyRo-cpu_php-project-48&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=LeyRo-cpu_php-project-48)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=LeyRo-cpu_php-project-48&metric=coverage)](https://sonarcloud.io/summary/new_code?id=LeyRo-cpu_php-project-48)
[![Reliability](https://sonarcloud.io/api/project_badges/measure?project=LeyRo-cpu_php-project-48&metric=reliability_rating)](https://sonarcloud.io/summary/new_code?id=LeyRo-cpu_php-project-48)
[![Security](https://sonarcloud.io/api/project_badges/measure?project=LeyRo-cpu_php-project-48&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=LeyRo-cpu_php-project-48)

## Description

A CLI utility for generating diffs between JSON files.

## Installation

```bash
composer install
```

## Usage

### CLI Usage

```bash
./gendiff file1.json file2.json
```

### Library Usage

```php
<?php

use Hexlet\Code\Differ;

$diff = Differ::genDiff('file1.json', 'file2.json');
echo $diff;
```

## Example

[![asciicast](https://asciinema.org/a/Pe6QypnLEmFWssNAjCOJN1iii.svg)](https://asciinema.org/a/Pe6QypnLEmFWssNAjCOJN1iii)

## Development

```bash
# Install dependencies
make install

# Run tests
make test

# Run linter
make lint

# Fix linting issues
make lint-fix
```