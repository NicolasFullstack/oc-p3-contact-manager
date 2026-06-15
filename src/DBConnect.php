<?php

class DBConnect
{
    private ?PDO $pdo = null;
    public function getPDO(): PDO
    {
       if ($this->pdo === null) {
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=projet3_contacts;charset=utf8',
            'root',
            ''
        );
    }

    return $this->pdo; 
    }
}