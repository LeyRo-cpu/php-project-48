<?php

namespace Hexlet\Code\Parsers;

use Symfony\Component\Yaml\Yaml;

class YamlParser implements ParserInterface
{
    public function parse(string $content): object
    {
        $data = Yaml::parse($content, Yaml::PARSE_OBJECT_FOR_MAP);
        if ($data === null) {
            throw new \Exception('Invalid YAML format');
        }
        return $data;
    }
}
