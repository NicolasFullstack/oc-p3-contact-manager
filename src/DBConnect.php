<?php

class DBConnect
{
    public function getPDO(): PDO
    {
        return new PDO(
            'mysql:host=localhost;dbname=projet3_contacts;charset=utf8',
            'root',
            ''
        );
    }
}