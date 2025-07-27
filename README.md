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
# Compare JSON files
./gendiff file1.json file2.json

# Compare YAML files
./gendiff file1.yml file2.yml

# Compare mixed formats
./gendiff file1.json file2.yml

# Compare nested structures
./gendiff nested1.json nested2.json
```

### Library Usage

```php
<?php

use Hexlet\Code\Differ;

// Compare JSON files
$diff = Differ::genDiff('file1.json', 'file2.json');

// Compare YAML files
$diff = Differ::genDiff('file1.yml', 'file2.yml');

// Compare mixed formats
$diff = Differ::genDiff('file1.json', 'file2.yml');

// Compare nested structures
$diff = Differ::genDiff('nested1.json', 'nested2.json');

echo $diff;
```

### Example Output

```
{
  common: {
    + follow: false
      setting1: Value 1
    - setting2: 200
    - setting3: true
    + setting3: null
    + setting4: blah blah
    + setting5: {key5: value5}
    setting6: {
      doge: {
        - wow: 
        + wow: so much
      }
        key: value
      + ops: vops
    }
  }
  group1: {
    - baz: bas
    + baz: bars
      foo: bar
    - nest: {key: value}
    + nest: str
  }
  - group2: {abc: 12345, deep: {id: 45}}
  + group3: {deep: {id: {number: 45}}, fee: 100500}
}
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