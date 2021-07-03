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

use Dictionary\StaticDictionary;

class Shell extends StaticDictionary
{
    public const FALLBACK = self::UNITY;

    public const XFCE  = 1;
    public const KDE   = 2;
    public const GNOME = 3;
    public const LXDE  = 4;
    public const UNITY = 5;
    public const MATE  = 6;

    protected static array $dictionary = [
        self::UNITY => 'Unity',
        self::GNOME => 'Gnome',
        self::KDE   => 'KDE',
        self::LXDE  => 'LXDE',
        self::XFCE  => 'Xfce',
        self::MATE  => 'MATE',
    ];
}
