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

class Shell extends StaticDictionary
{
    const FALLBACK = self::UNITY;

    const XFCE  = 1;
    const KDE   = 2;
    const GNOME = 3;
    const LXDE  = 4;
    const UNITY = 5;
    const MATE  = 6;

    /**
     * {@inheritdoc}
     */
    public static function all()
    {
        return [
            self::UNITY => 'Unity',
            self::GNOME => 'Gnome',
            self::KDE   => 'KDE',
            self::LXDE  => 'LXDE',
            self::XFCE  => 'Xfce',
            self::MATE  => 'MATE',
        ];
    }
}
