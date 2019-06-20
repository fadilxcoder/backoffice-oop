<?php

abstract class AbstractTask{
    
    public function convertToArray($query)
    {
        $arr = array();
        while( $data = $query->fetch(PDO::FETCH_ASSOC)):
            $arr[] = $data;
        endwhile;
        return $arr;
    }

    public function convertToObject($query)
    {
        $arr = array();
        while( $data = $query->fetch(PDO::FETCH_OBJ)):
            $arr[] = $data;
        endwhile;
        return $arr;
    }
}