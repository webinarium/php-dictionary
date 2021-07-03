<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015-2021 Artem Rodygin
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
    // Fallback key of the default value to return on non-existing keys.
    public const FALLBACK = null;

    /**
     * @var array Dictionary values (to be overloaded).
     */
    protected static array $dictionary = [];

    /**
     * {@inheritdoc}
     */
    public static function all(): array
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
    public static function has($key): bool
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
    public static function keys(): array
    {
        return array_keys(static::dictionary());
    }

    /**
     * {@inheritdoc}
     */
    public static function values(): array
    {
        return array_values(static::dictionary());
    }

    /**
     * Returns dictionary.
     *
     * @return array
     */
    protected static function dictionary(): array
    {
        return static::$dictionary;
    }
}
