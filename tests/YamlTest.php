<?php

namespace Hexlet\Code\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Code\Differ;

class YamlTest extends TestCase
{
    private string $fixturesPath;

    protected function setUp(): void
    {
        $this->fixturesPath = __DIR__ . '/fixtures/';
    }

    public function testGenDiffWithYamlFiles(): void
    {
        $file1 = $this->fixturesPath . 'file1.yml';
        $file2 = $this->fixturesPath . 'file2.yml';

        $result = Differ::genDiff($file1, $file2);

        $this->assertStringContainsString('  - follow: false', $result);
        $this->assertStringContainsString('    host: hexlet.io', $result);
        $this->assertStringContainsString('  - proxy: 123.234.53.22', $result);
        $this->assertStringContainsString('  - timeout: 50', $result);
        $this->assertStringContainsString('  + timeout: 20', $result);
        $this->assertStringContainsString('  + verbose: true', $result);
    }

    public function testGenDiffWithMixedFormats(): void
    {
        $file1 = $this->fixturesPath . 'file1.json';
        $file2 = $this->fixturesPath . 'file2.yml';

        $result = Differ::genDiff($file1, $file2);

        $this->assertStringContainsString('  - follow: false', $result);
        $this->assertStringContainsString('    host: hexlet.io', $result);
        $this->assertStringContainsString('  - proxy: 123.234.53.22', $result);
        $this->assertStringContainsString('  - timeout: 50', $result);
        $this->assertStringContainsString('  + timeout: 20', $result);
        $this->assertStringContainsString('  + verbose: true', $result);
    }

    public function testGenDiffWithYamlAndJson(): void
    {
        $file1 = $this->fixturesPath . 'file1.yml';
        $file2 = $this->fixturesPath . 'file2.json';

        $result = Differ::genDiff($file1, $file2);

        $this->assertStringContainsString('  - follow: false', $result);
        $this->assertStringContainsString('    host: hexlet.io', $result);
        $this->assertStringContainsString('  - proxy: 123.234.53.22', $result);
        $this->assertStringContainsString('  - timeout: 50', $result);
        $this->assertStringContainsString('  + timeout: 20', $result);
        $this->assertStringContainsString('  + verbose: true', $result);
    }
}
