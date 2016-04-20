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
    /** @var array Shared cache of all dictionaries. */
    private static $cache = [];

    /**
     * Returns the dictionary as associated array.
     *
     * @return  array
     */
    private static function getFromCache()
    {
        $dictionary = get_called_class();

        if (!array_key_exists($dictionary, self::$cache)) {
            self::$cache[$dictionary] = static::all();
        }

        return self::$cache[$dictionary];
    }

    /**
     * {@inheritdoc}
     */
    public static function get($key)
    {
        $dictionary = static::getFromCache();

        if (array_key_exists($key, $dictionary)) {
            return $dictionary[$key];
        }
        else {
            return static::FALLBACK === null ? null : $dictionary[static::FALLBACK];
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function has($key)
    {
        $dictionary = static::getFromCache();

        return array_key_exists($key, $dictionary);
    }

    /**
     * {@inheritdoc}
     */
    public static function keys()
    {
        $dictionary = static::getFromCache();

        return array_keys($dictionary);
    }

    /**
     * {@inheritdoc}
     */
    public static function values()
    {
        $dictionary = static::getFromCache();

        return array_values($dictionary);
    }
}
