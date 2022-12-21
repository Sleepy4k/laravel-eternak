<?php
  
namespace App\Traits;

trait CacheKey
{
    /**
     * Replace string to upper cased
     * 
     * @param $string
     * @var string
     */
    protected function replaceStringToUpperCase($string)
    {
        $uppercase = strtoupper($string);

        return $uppercase;
    }
    
    /**
     * Generate cache key
     * 
     * @param $name, $key
     * @var string
     */
    protected function generateChaceKey($name, $key)
    {
        $uppercased = $this->replaceStringToUpperCase($key);
        return "$name.$uppercased";
    }

    /**
     * Check if blade templating is exists
     * 
     * @param $view
     * @var void
     */
    protected function getNumberCacheKey($name, $key, $index, $data)
    {
        $key = strtoupper($key);

        return "$name.$key.$index.$data";
    }
}