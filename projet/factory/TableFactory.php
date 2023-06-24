<?php

class TableFactory
{

    public static function getValuesArray($obj)
    {
        $val_array = array();
        foreach ($obj->liste_fields as $key => $value) {
            $val_array[$key] = $obj->$key;
        }
        return $val_array;
    }
}