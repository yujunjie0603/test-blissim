<?php

class TableFactory
{

    /**
     * retourner  un tableau de tous les champs d'un table, example: la table client, retourn array('id' => '1', 'name' => 'xxxx', ...)
     * @param mixed $obj
     * @return array 
     */
    public static function getValuesArray($obj)
    {
        $val_array = array();
        foreach ($obj->liste_fields as $key => $value) {
            $val_array[$key] = $obj->$key;
        }
        return $val_array;
    }
}