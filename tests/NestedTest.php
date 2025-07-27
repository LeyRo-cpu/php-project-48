<?php

namespace Hexlet\Code\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Code\Differ;

class NestedTest extends TestCase
{
    private string $fixturesPath;

    protected function setUp(): void
    {
        $this->fixturesPath = __DIR__ . '/fixtures/';
    }

    public function testNestedJsonComparison(): void
    {
        $file1 = $this->fixturesPath . 'nested1.json';
        $file2 = $this->fixturesPath . 'nested2.json';

        $result = Differ::genDiff($file1, $file2);

        // Проверяем основные изменения
        $this->assertStringContainsString('  common: {', $result);
        $this->assertStringContainsString('    + follow: false', $result);
        $this->assertStringContainsString('      setting1: Value 1', $result);
        $this->assertStringContainsString('    - setting2: 200', $result);
        $this->assertStringContainsString('    - setting3: true', $result);
        $this->assertStringContainsString('    + setting3: null', $result);
        $this->assertStringContainsString('    + setting4: blah blah', $result);
        $this->assertStringContainsString('    + setting5: {key5: value5}', $result);
        $this->assertStringContainsString('    setting6: {', $result);
        $this->assertStringContainsString('      doge: {', $result);
        $this->assertStringContainsString('        - wow:', $result);
        $this->assertStringContainsString('        + wow: so much', $result);
        $this->assertStringContainsString('      }', $result);
        $this->assertStringContainsString('        key: value', $result);
        $this->assertStringContainsString('      + ops: vops', $result);
        $this->assertStringContainsString('    }', $result);
        $this->assertStringContainsString('  }', $result);
        $this->assertStringContainsString('  group1: {', $result);
        $this->assertStringContainsString('    - baz: bas', $result);
        $this->assertStringContainsString('    + baz: bars', $result);
        $this->assertStringContainsString('      foo: bar', $result);
        $this->assertStringContainsString('    - nest: {key: value}', $result);
        $this->assertStringContainsString('    + nest: str', $result);
        $this->assertStringContainsString('  }', $result);
        $this->assertStringContainsString('  - group2: {abc: 12345, deep: {id: 45}}', $result);
        $this->assertStringContainsString('  + group3: {deep: {id: {number: 45}}, fee: 100500}', $result);
    }

    public function testNestedYamlComparison(): void
    {
        $file1 = $this->fixturesPath . 'nested1.yml';
        $file2 = $this->fixturesPath . 'nested2.yml';

        $result = Differ::genDiff($file1, $file2);

        // Проверяем основные изменения
        $this->assertStringContainsString('  common: {', $result);
        $this->assertStringContainsString('    + follow: false', $result);
        $this->assertStringContainsString('      setting1: Value 1', $result);
        $this->assertStringContainsString('    - setting2: 200', $result);
        $this->assertStringContainsString('    - setting3: true', $result);
        $this->assertStringContainsString('    + setting3: null', $result);
        $this->assertStringContainsString('    + setting4: blah blah', $result);
    }

    public function testMixedNestedFormats(): void
    {
        $file1 = $this->fixturesPath . 'nested1.json';
        $file2 = $this->fixturesPath . 'nested2.yml';

        $result = Differ::genDiff($file1, $file2);

        // Проверяем основные изменения
        $this->assertStringContainsString('  common: {', $result);
        $this->assertStringContainsString('    + follow: false', $result);
        $this->assertStringContainsString('      setting1: Value 1', $result);
        $this->assertStringContainsString('    - setting2: 200', $result);
        $this->assertStringContainsString('    - setting3: true', $result);
        $this->assertStringContainsString('    + setting3: null', $result);
        $this->assertStringContainsString('    + setting4: blah blah', $result);
    }
}
