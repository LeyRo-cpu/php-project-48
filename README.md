# php-project-48

[![Actions Status](https://github.com/LeyRo-cpu/php-project-48/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/LeyRo-cpu/php-project-48/actions)

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