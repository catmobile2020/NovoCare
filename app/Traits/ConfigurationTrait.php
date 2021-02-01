<?php


namespace App\Traits;
use Config;

trait ConfigurationTrait
{
    public static function get($key)
    {
        $configuration = new self();
        $entry = $configuration->where('key', $key)->first();

        if (!$entry) {
            return;
        }

        return $entry->value;
    }
    public static function set($key, $value = null)
    {
        $prefixed_key = 'configurations.'.$key;
        $configuration = new self();
        $entry = $configuration->where('key', $key)->firstOrFail();

        // update the value in the database
        $entry->value = $value;
        $entry->saveOrFail();

        // update the value in the session
        Config::set($prefixed_key, $value);

        if (Config::get($prefixed_key) == $value) {
            return true;
        }

        return false;
    }
}
