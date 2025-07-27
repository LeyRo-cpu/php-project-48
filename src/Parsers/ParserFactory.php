<?php

namespace Hexlet\Code\Parsers;

class ParserFactory
{
    public static function create(string $filePath): ParserInterface
    {
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        return match ($extension) {
            'json' => new JsonParser(),
            'yml', 'yaml' => new YamlParser(),
            default => throw new \Exception("Unsupported file format: $extension"),
        };
    }
}
