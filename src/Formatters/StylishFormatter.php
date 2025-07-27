<?php

namespace Hexlet\Code\Formatters;

use Hexlet\Code\Diff\DiffNode;

class StylishFormatter
{
    public static function format(array $diff): string
    {
        return "{\n" . self::formatNodes($diff, 1) . "\n}";
    }

    private static function formatNodes(array $nodes, int $depth): string
    {
        $result = [];

        foreach ($nodes as $node) {
            $prefix = match ($node->type) {
                'added' => '+',
                'removed' => '-',
                'unchanged', 'nested' => ' ',
                default => ' '
            };

            $indent = str_repeat('  ', $depth);
            $formattedIndent = str_repeat('  ', $depth - 1) . '  ' . $prefix . ' ';

            if ($node->type === 'nested') {
                $result[] = $indent . $node->key . ': {';
                $result[] = self::formatNodes($node->children, $depth + 1);
                $result[] = $indent . '}';
            } else {
                $value = self::formatValue($node->value);
                $result[] = $formattedIndent . $node->key . ': ' . $value;
            }
        }

        return implode("\n", $result);
    }

    private static function formatValue($value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_null($value)) {
            return 'null';
        }
        if (is_object($value)) {
            return '{' . self::formatObject($value) . '}';
        }
        return (string) $value;
    }

    private static function formatObject(object $obj): string
    {
        $keys = get_object_vars($obj);
        if (empty($keys)) {
            return '';
        }

        $result = [];
        foreach ($keys as $key => $value) {
            $result[] = $key . ': ' . self::formatValue($value);
        }
        return implode(', ', $result);
    }
}
