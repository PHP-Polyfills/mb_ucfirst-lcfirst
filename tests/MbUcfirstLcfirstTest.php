<?php

namespace Polyfills\MbUcfirstLcfirstPolyfill\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MbUcfirstLcfirstTest extends TestCase {

    #[DataProvider('ucFirstDataProvider')]
    public function testMbUcFirst(string $string, string $expected): void {
        $this->assertSame($expected, \mb_ucfirst($string));
    }

    #[DataProvider('lcFirstDataProvider')]
    public function testMbLcFirst(string $string, string $expected): void {
        $this->assertSame($expected, \mb_lcfirst($string));
    }

    public static function ucFirstDataProvider(): array {
        return [
            ['', ''],
            ['test', 'Test'],
            ['TEST', 'TEST'],
            ['TesT', 'TesT'],
            ['ａｂ', 'Ａｂ'],
            ['ＡＢＳ', 'ＡＢＳ'],
            ['đắt quá!', 'Đắt quá!'],
            ['აბგ', 'აბგ'],
            ['ǉ', 'ǈ'],
            ["\u{01CA}", "\u{01CB}"],
            ["\u{01CA}\u{01CA}", "\u{01CB}\u{01CA}"],
        ];
    }

    public static function lcFirstDataProvider(): array {
        return [
            ['', ''],
            ['test', 'test'],
            ['Test', 'test'],
            ['tEST', 'tEST'],
            ['Ａｂ', 'ａｂ'],
            ['ＡＢＳ', 'ａＢＳ'],
            ['Đắt quá!', 'đắt quá!'],
            ['აბგ', 'აბგ'],
            ['ǈ', 'ǉ'],
            ["\u{01CB}", "\u{01CC}"],
            ["\u{01CA}", "\u{01CC}"],
            ["\u{01CA}\u{01CA}", "\u{01CC}\u{01CA}"],
        ];
    }
}
