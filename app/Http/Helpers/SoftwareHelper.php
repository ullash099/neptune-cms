<?php

use Illuminate\Support\Facades\App;
if (!function_exists('ConvertToLang')) {
    function ConvertToLang($object, $en = null, $local = null)
    {
        $lang = App::getLocale();
        if (empty($en) && empty($local)) {
            if ($lang == 'bn') {
                if (!empty($object->name_l)) {
                    return $object->name_l;
                } else {
                    return $object->name;
                }
            } else {
                return $object->name;
            }
        } else {
            if ($lang == 'bn') {
                if (!empty($object->$local)) {
                    return $object->$local;
                } else {
                    return $object->$en;
                }
            } else {
                return $object->$en;
            }
        }
    }
}

if (!function_exists('DebugMe')) {
    function DebugMe($value, $die = 0)
    {
        echo '<pre>';
        if (is_array($value)) {
            print_r($value);
        } elseif (is_object($value)) {
            print_r($value);
        } else {
            echo $value;
        }
        echo '</pre>';
        if ($die != 0) {
            die();
        }
    }
}


?>