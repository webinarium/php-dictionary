<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015-2020 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Tests\Dictionary;

use Dictionary\StaticDictionary;

class Color extends StaticDictionary
{
    public const BLACK   = 'Black';
    public const BLUE    = 'Blue';
    public const GREEN   = 'Green';
    public const CYAN    = 'Cyan';
    public const RED     = 'Red';
    public const MAGENTA = 'Magenta';
    public const YELLOW  = 'Yellow';
    public const WHITE   = 'White';
    public const GREY    = 'Grey';
    public const GRAY    = 'Gray';

    protected static array $dictionary = [
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
