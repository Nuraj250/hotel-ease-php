<?php

class Model {
    protected $db;

    public function __construct() {
        $config = require __DIR__ . '/../../config/config.php';
        $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']}";
        $this->db = new PDO($dsn, $config['db_user'], $config['db_pass']);
    }
}
