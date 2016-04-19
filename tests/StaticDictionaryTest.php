<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Tests\Dictionary;

require_once __DIR__ . '/Color.php';

class StaticDictionaryTest extends \PHPUnit_Framework_TestCase
{
    public function testAll()
    {
        $expected = [
            Color::BLACK   => '#000000',
            Color::BLUE    => '#0000FF',
            Color::GREEN   => '#00FF00',
            Color::CYAN    => '#00FFFF',
            Color::RED     => '#FF0000',
            Color::MAGENTA => '#FF00FF',
            Color::YELLOW  => '#FFFF00',
            Color::WHITE   => '#FFFFFF',
        ];

        self::assertEquals($expected, Color::all());
    }

    public function testGet()
    {
        self::assertEquals('#0000FF', Color::get(Color::BLUE));
        self::assertNull(Color::get('Unknown'));
    }

    public function testHas()
    {
        self::assertTrue(Color::has(Color::BLUE));
        self::assertFalse(Color::has('Unknown'));
    }

    public function testKeys()
    {
        $expected = [
            Color::BLACK,
            Color::BLUE,
            Color::GREEN,
            Color::CYAN,
            Color::RED,
            Color::MAGENTA,
            Color::YELLOW,
            Color::WHITE,
        ];

        self::assertEquals($expected, Color::keys());
    }

    public function testValues()
    {
        $expected = [
            '#000000',
            '#0000FF',
            '#00FF00',
            '#00FFFF',
            '#FF0000',
            '#FF00FF',
            '#FFFF00',
            '#FFFFFF',
        ];

        self::assertEquals($expected, Color::values());
    }
}
