<?php

namespace Hexlet\Code;

use Hexlet\Code\Parsers\ParserFactory;

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

        $parser = ParserFactory::create($filePath);
        return $parser->parse($fileContent);
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
