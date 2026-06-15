<?php

/**
 * Gère la connexion à la base de données.
 */
class DBConnect
{
    /**
     * Instance PDO réutilisée dans l'application.
     */
    private ?PDO $pdo = null;

    /**
     * Retourne une connexion PDO.
     * La connexion n'est créée qu'une seule fois puis réutilisée.
     */
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