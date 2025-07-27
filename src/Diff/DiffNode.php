<?php

namespace Hexlet\Code\Diff;

class DiffNode
{
    public function __construct(
        public string $type,
        public string $key,
        public mixed $value,
        public ?array $children = null
    ) {
    }
}
