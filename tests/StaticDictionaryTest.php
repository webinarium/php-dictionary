<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015-2021 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Tests\Dictionary;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/Color.php';
require_once __DIR__ . '/Shell.php';

/**
 * @coversDefaultClass \Dictionary\StaticDictionary
 */
class StaticDictionaryTest extends TestCase
{
    /**
     * @covers ::all
     * @covers ::dictionary
     */
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

        self::assertSame($expected, Shell::all());
    }

    /**
     * @coversNothing
     */
    public function testFallback()
    {
        self::assertNull(Color::FALLBACK);
        self::assertNotNull(Shell::FALLBACK);
    }

    /**
     * @covers ::get
     */
    public function testGet()
    {
        self::assertSame('Gnome', Shell::get(Shell::GNOME));
        self::assertSame('Unity', Shell::get(Color::BLACK));
    }

    /**
     * @covers ::has
     */
    public function testHas()
    {
        self::assertTrue(Shell::has(Shell::GNOME));
        self::assertFalse(Shell::has(Color::BLACK));
    }

    /**
     * @covers ::find
     */
    public function testFind()
    {
        self::assertSame(Shell::GNOME, Shell::find('Gnome'));
        self::assertSame(Shell::UNITY, Shell::find('Cinnamon'));

        self::assertNull(Color::find(Shell::GNOME));
        self::assertSame(Color::GREY, Color::find('#808080'));
        self::assertNotSame(Color::GRAY, Color::find('#808080'));
    }

    /**
     * @covers ::keys
     */
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

        self::assertSame($expected, Shell::keys());
    }

    /**
     * @covers ::values
     */
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

        self::assertSame($expected, Shell::values());
    }
}
