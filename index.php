<?php
function revertCharacters($string){
    $string_reversed = explode(' ', $string);
    foreach ($string_reversed as & $item){
        $item = str_split($item);
        $uppers = [];
        foreach ($item as $key => & $value){
            if (ctype_upper($value)) array_push($uppers, $key);
        }
        $item = array_reverse($item);
        foreach ($item as $key => & $value) {
            if (in_array($key, $uppers)) $value = strtoupper($value);
            else $value = strtolower($value);
        }
        $item = implode($item);
    }
    $string_reversed = join(' ', $string_reversed);
    return $string_reversed;
}

$str = 'zxc';
echo revertCharacters($str);