<?php

namespace Hexlet\Code;

class Parser
{
    public static function parseFile(string $filePath): object
    {
        if (!file_exists($filePath)) {
            throw new \Exception("File not found: $filePath");
        }

        $fileContent = file_get_contents($filePath);
        if ($fileContent === false) {
            throw new \Exception("Cannot read file: $filePath");
        }

        $data = json_decode($fileContent);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Invalid JSON in file: $filePath");
        }

        return $data;
    }

    public static function printParsedData(object $data, string $fileName): void
    {
        echo "=== Parsed data from $fileName ===\n";
        $keys = get_object_vars($data);

        foreach ($keys as $key => $value) {
            $type = gettype($value);
            $valueStr = is_bool($value) ? ($value ? 'true' : 'false') : $value;
            echo "Key: $key, Value: $valueStr, Type: $type\n";
        }
        echo "\n";
    }
} 