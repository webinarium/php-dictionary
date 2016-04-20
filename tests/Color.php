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

require_once __DIR__ . '/../vendor/autoload.php';

use Dictionary\StaticDictionary;

class Color extends StaticDictionary
{
    const BLACK   = 'Black';
    const BLUE    = 'Blue';
    const GREEN   = 'Green';
    const CYAN    = 'Cyan';
    const RED     = 'Red';
    const MAGENTA = 'Magenta';
    const YELLOW  = 'Yellow';
    const WHITE   = 'White';
    const GREY    = 'Grey';
    const GRAY    = 'Gray';

    /**
     * {@inheritdoc}
     */
    public static function all()
    {
        return [
            self::BLACK   => '#000000',
            self::BLUE    => '#0000FF',
            self::GREEN   => '#00FF00',
            self::CYAN    => '#00FFFF',
            self::RED     => '#FF0000',
            self::MAGENTA => '#FF00FF',
            self::YELLOW  => '#FFFF00',
            self::WHITE   => '#FFFFFF',
            self::GREY    => '#808080',
            self::GRAY    => '#808080',
        ];
    }
}
