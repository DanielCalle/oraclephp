<?php


class DAOConnection
{
    private static $instance;
    public static function getConnection() {
        if(!isset($instance)) {
            $instance = oci_connect('abd', 'XXX', 'localhost/XE');
        }
        return $instance;
        
    }
}