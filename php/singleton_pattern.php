<?php

class DBConnection {
    private static $instance = null;
    private function __construct() {}
    static function getInstance() {
        if (!self::$instance) self::$instance = new DBConnection();
        return self::$instance;
    }
}

// usage 

