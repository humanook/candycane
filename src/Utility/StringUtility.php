<?php

namespace App\Utility;

class StringUtility
{
    /**
     * @param string $format
     * @param array $options
     * @return string
     */
    public static function getFormatAsString(string $format, $options = []): string
    {
        $ret = $format;
        foreach($options as $key=>$value) {
            $ret = str_replace('%{'.$key.'}',$value,$ret);
        }
        $ret = preg_replace('/\%\{(.*)\}/','',$ret);
        return $ret;
    }
}
