<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015-2020 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Dictionary;

/**
 * Interface to static dictionary of key/value pairs.
 */
interface StaticDictionaryInterface
{
    // Fallback key of the default value to return on non-existing keys.
    public const FALLBACK = null;

    /**
     * Returns whole dictionary as associated array.
     *
     * @return array
     */
    public static function all(): array;

    /**
     * Returns value by specified key.
     *
     * If the key doesn't exist, returns fallback value using 'FALLBACK' constant as the key;
     * if 'FALLBACK' constant is not defined, returns NULL.
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public static function get($key);

    /**
     * Checks whether the dictionary contains specified key.
     *
     * @param mixed $key
     *
     * @return bool
     */
    public static function has($key): bool;

    /**
     * Finds key by specified value.
     *
     * If the value doesn't exist, returns 'FALLBACK' constant; if 'FALLBACK' constant is not defined, returns NULL.
     * When dictionary contains several values, the key of the first found value is returned.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public static function find($value);

    /**
     * Returns all keys of the dictionary.
     *
     * @return array
     */
    public static function keys(): array;

    /**
     * Returns all values of the dictionary.
     *
     * @return array
     */
    public static function values(): array;
}
