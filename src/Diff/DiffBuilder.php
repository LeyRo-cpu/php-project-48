<?php

namespace Hexlet\Code\Diff;

use function Funct\Collection\sortBy;

class DiffBuilder
{
    public static function build(object $data1, object $data2): array
    {
        $keys1 = get_object_vars($data1);
        $keys2 = get_object_vars($data2);

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
                $result[] = new DiffNode('added', $key, $value2);
            } elseif (!$hasKey2) {
                // Ключ есть только в первом файле
                $result[] = new DiffNode('removed', $key, $value1);
            } elseif (self::isObject($value1) && self::isObject($value2)) {
                // Оба значения - объекты, рекурсивно сравниваем
                $children = self::build($value1, $value2);
                $result[] = new DiffNode('nested', $key, null, $children);
            } elseif ($value1 !== $value2) {
                // Значения разные
                $result[] = new DiffNode('removed', $key, $value1);
                $result[] = new DiffNode('added', $key, $value2);
            } else {
                // Значения одинаковые
                $result[] = new DiffNode('unchanged', $key, $value1);
            }
        }

        return $result;
    }

    private static function isObject($value): bool
    {
        return is_object($value) && !($value instanceof \stdClass && empty(get_object_vars($value)));
    }
}
