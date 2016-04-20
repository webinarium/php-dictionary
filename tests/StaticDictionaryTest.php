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
require_once __DIR__ . '/Shell.php';

class StaticDictionaryTest extends \PHPUnit_Framework_TestCase
{
    public function testAll()
    {
        $expected = [
            Shell::UNITY => 'Unity',
            Shell::GNOME => 'Gnome',
            Shell::KDE   => 'KDE',
            Shell::LXDE  => 'LXDE',
            Shell::XFCE  => 'Xfce',
            Shell::MATE  => 'MATE',
        ];

        self::assertEquals($expected, Shell::all());
    }

    public function testFallback()
    {
        self::assertNull(Color::FALLBACK);
        self::assertNotNull(Shell::FALLBACK);
    }

    public function testGet()
    {
        self::assertEquals('Gnome', Shell::get(Shell::GNOME));
        self::assertEquals('Unity', Shell::get(Color::BLACK));
    }

    public function testHas()
    {
        self::assertTrue(Shell::has(Shell::GNOME));
        self::assertFalse(Shell::has(Color::BLACK));
    }

    public function testFind()
    {
        self::assertEquals(Shell::GNOME, Shell::find('Gnome'));
        self::assertEquals(Shell::UNITY, Shell::find('Cinnamon'));

        self::assertNull(Color::find(Shell::GNOME));
        self::assertEquals(Color::GREY, Color::find('#808080'));
        self::assertNotEquals(Color::GRAY, Color::find('#808080'));
    }

    public function testKeys()
    {
        $expected = [
            Shell::UNITY,
            Shell::GNOME,
            Shell::KDE,
            Shell::LXDE,
            Shell::XFCE,
            Shell::MATE,
        ];

        self::assertEquals($expected, Shell::keys());
    }

    public function testValues()
    {
        $expected = [
            'Unity',
            'Gnome',
            'KDE',
            'LXDE',
            'Xfce',
            'MATE',
        ];

        self::assertEquals($expected, Shell::values());
    }
}
