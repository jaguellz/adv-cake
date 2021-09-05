<?php
class Reverser
{
    public function revertCharacters($string)
    {
        $string_reversed = explode(' ', $string);
        foreach ($string_reversed as & $item) {
            $item = str_split($item);
            $uppers = [];
            foreach ($item as $key => & $value) {
                if (ctype_upper($value)) array_push($uppers, $key);
            }
            $item = implode($item);
            $item = preg_replace_callback('/\w+/', function($found) {
                foreach ($found as $item) {
                    return strrev($item);
                }
            }, $item);
            $item = str_split($item);
            foreach ($item as $key => & $value) {
                if (in_array($key, $uppers)) $value = strtoupper($value);
                else $value = strtolower($value);
            }
            $item = implode($item);
        }
        $string_reversed = join(' ', $string_reversed);
        return $string_reversed;
    }
}