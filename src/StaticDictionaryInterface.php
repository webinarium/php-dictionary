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
 * Interface to static dictionary of key/value pairs.
 */
interface StaticDictionaryInterface
{
    /**
     * Returns whole dictionary as associated array.
     *
     * @return  array
     */
    public static function all();

    /**
     * Returns value by specified key.
     * If the key doesn't exist, returns NULL.
     *
     * @param   mixed $key
     *
     * @return  mixed
     */
    public static function get($key);

    /**
     * Checks whether the dictionary contains specified key.
     *
     * @param   mixed $key
     *
     * @return  bool
     */
    public static function has($key);

    /**
     * Returns all keys of the dictionary.
     *
     * @return  array
     */
    public static function keys();

    /**
     * Returns all values of the dictionary.
     *
     * @return  array
     */
    public static function values();
}
