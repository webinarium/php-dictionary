<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Dictionary;

/**
 * Abstract static dictionary of key/value pairs.
 */
abstract class StaticDictionary implements StaticDictionaryInterface
{
    /** @var array Dictionary values (to be overloaded). */
    protected static $dictionary = [];

    /**
     * {@inheritdoc}
     */
    public static function all()
    {
        return static::dictionary();
    }

    /**
     * {@inheritdoc}
     */
    public static function get($key)
    {
        $dictionary = static::dictionary();

        if (array_key_exists($key, $dictionary)) {
            return $dictionary[$key];
        }

        return static::FALLBACK === null ? null : $dictionary[static::FALLBACK];

    }

    /**
     * {@inheritdoc}
     */
    public static function has($key)
    {
        return array_key_exists($key, static::dictionary());
    }

    /**
     * {@inheritdoc}
     */
    public static function find($value)
    {
        $key = array_search($value, static::dictionary(), true);

        return $key === false ? static::FALLBACK : $key;
    }

    /**
     * {@inheritdoc}
     */
    public static function keys()
    {
        return array_keys(static::dictionary());
    }

    /**
     * {@inheritdoc}
     */
    public static function values()
    {
        return array_values(static::dictionary());
    }

    /**
     * Returns dictionary.
     *
     * @return  array
     */
    protected static function dictionary()
    {
        return static::$dictionary;
    }
}
