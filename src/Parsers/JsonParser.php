<?php

namespace Hexlet\Code\Parsers;

class JsonParser implements ParserInterface
{
    public function parse(string $content): object
    {
        $data = json_decode($content);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON format');
        }
        return $data;
    }
}
