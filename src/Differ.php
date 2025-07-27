<?php

namespace Hexlet\Code;

use function Funct\Collection\sortBy;

class Differ
{
    public static function genDiff(string $pathToFile1, string $pathToFile2): string
    {
        $data1 = Parser::parseFile($pathToFile1);
        $data2 = Parser::parseFile($pathToFile2);

        $keys1 = get_object_vars($data1);
        $keys2 = get_object_vars($data2);

        // Получаем все уникальные ключи и сортируем их
        $allKeys = array_unique(array_merge(array_keys($keys1), array_keys($keys2)));
        $sortedKeys = sortBy($allKeys, function ($key) {
            return $key;
        });

        $result = [];
        foreach ($sortedKeys as $key) {
            $hasKey1 = array_key_exists($key, $keys1);
            $hasKey2 = array_key_exists($key, $keys2);
            $value1 = $hasKey1 ? $keys1[$key] : null;
            $value2 = $hasKey2 ? $keys2[$key] : null;

            if (!$hasKey1) {
                // Ключ есть только во втором файле
                $result[] = "  + $key: " . self::formatValue($value2);
            } elseif (!$hasKey2) {
                // Ключ есть только в первом файле
                $result[] = "  - $key: " . self::formatValue($value1);
            } elseif ($value1 !== $value2) {
                // Ключ есть в обоих файлах, но значения разные
                $result[] = "  - $key: " . self::formatValue($value1);
                $result[] = "  + $key: " . self::formatValue($value2);
            } else {
                // Ключ есть в обоих файлах и значения одинаковые
                $result[] = "    $key: " . self::formatValue($value1);
            }
        }

        return "{\n" . implode("\n", $result) . "\n}";
    }

    private static function formatValue($value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_null($value)) {
            return 'null';
        }
        return (string) $value;
    }
} 