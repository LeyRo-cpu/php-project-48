<?php

namespace Hexlet\Code\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Code\Differ;

class DifferTest extends TestCase
{
    private string $fixturesPath;

    protected function setUp(): void
    {
        $this->fixturesPath = __DIR__ . '/fixtures/';
    }

    public function testGenDiff(): void
    {
        $file1 = $this->fixturesPath . 'file1.json';
        $file2 = $this->fixturesPath . 'file2.json';

        $result = Differ::genDiff($file1, $file2);

        $this->assertStringContainsString('  - follow: false', $result);
        $this->assertStringContainsString('    host: hexlet.io', $result);
        $this->assertStringContainsString('  - proxy: 123.234.53.22', $result);
        $this->assertStringContainsString('  - timeout: 50', $result);
        $this->assertStringContainsString('  + timeout: 20', $result);
        $this->assertStringContainsString('  + verbose: true', $result);
    }

    public function testGenDiffWithSameFiles(): void
    {
        $file1 = $this->fixturesPath . 'file1.json';
        $file2 = $this->fixturesPath . 'file1.json';

        $result = Differ::genDiff($file1, $file2);

        $this->assertStringContainsString('host: hexlet.io', $result);
        $this->assertStringContainsString('timeout: 50', $result);
        $this->assertStringContainsString('proxy: 123.234.53.22', $result);
        $this->assertStringContainsString('follow: false', $result);
        $this->assertStringNotContainsString('+', $result);
        $this->assertStringNotContainsString('-', $result);
    }

    public function testGenDiffWithNonExistentFile(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('File not found: nonexistent.json');

        Differ::genDiff('nonexistent.json', $this->fixturesPath . 'file1.json');
    }
}
