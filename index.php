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
            $item = preg_replace_callback('/\w+/u', function($found) {
                foreach ($found as $item) {
                    return $this->strrev_enc($item);
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
    public function strrev_enc($str)
    {
	    $str = iconv('utf-8', 'windows-1251', $str);
	    $str = strrev($str);
	    $str = iconv('windows-1251', 'utf-8', $str);
	    return $str;
    }
}
