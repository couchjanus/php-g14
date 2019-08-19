<?php

abstract class Model extends Connection
// class Model extends Connection
{
    public function __construct()
    {
        Connection::connect(require_once DB_CONFIG_FILE);
    }
    
    static public function query($query)
    {
        return self::$instance->query($query);
    }
    
    static public function prepare($sql)
    {
        return self::$instance->prepare($sql);
    }    

}