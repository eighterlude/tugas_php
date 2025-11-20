<?php

class Database {
    private $host = 'localhost';
    private $db   = 'tugas_php'; // nama database kamu
    private $user = 'root';
    private $pass = '';

    public function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8";
        return new PDO($dsn, $this->user, $this->pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
