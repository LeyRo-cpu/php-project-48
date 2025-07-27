<?php

namespace Hexlet\Code;

use Hexlet\Code\Diff\DiffBuilder;
use Hexlet\Code\Formatters\StylishFormatter;

class Differ
{
    public static function genDiff(string $pathToFile1, string $pathToFile2, string $format = 'stylish'): string
    {
        $data1 = Parser::parseFile($pathToFile1);
        $data2 = Parser::parseFile($pathToFile2);

        $diff = DiffBuilder::build($data1, $data2);

        return match ($format) {
            'stylish' => StylishFormatter::format($diff),
            default => throw new \Exception("Unsupported format: $format"),
        };
    }
}
