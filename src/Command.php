<?php

/**
 * Contient l'ensemble des commandes disponibles dans l'application.
 */
class Command
{
    /**
     * Affiche la liste complète des contacts.
     */
    public function list(): void
    {
        $dbConnect = new DBConnect();

        $contactManager = new ContactManager($dbConnect->getPDO());

        $contacts = $contactManager->findAll();

        foreach ($contacts as $contact) {
            echo $contact . PHP_EOL;
        }
    }

    /**
     * Affiche le détail d'un contact grâce à son identifiant.
     */
    public function detail(int $id): void
    {
        $dbConnect = new DBConnect();

        $contactManager = new ContactManager($dbConnect->getPDO());

        $contact = $contactManager->findById($id);

        echo $contact . PHP_EOL;
    }

    /**
     * Crée un nouveau contact.
     */
    public function create(string $name, string $email, string $phoneNumber): void
    {
        $dbConnect = new DBConnect();

        $contactManager = new ContactManager($dbConnect->getPDO());

        $contactManager->create($name, $email, $phoneNumber);
    }

    /**
     * Supprime un contact grâce à son identifiant.
     */
    public function delete(int $id): void
    {
        $dbConnect = new DBConnect();

        $contactManager = new ContactManager($dbConnect->getPDO());

        $contactManager->delete($id);
    }

    /**
     * Affiche l'aide et la liste des commandes disponibles.
     */
    public function help(): void
    {
        echo "Afficher la liste des contacts : list" . PHP_EOL;
        echo "Afficher le détail d'un contact : detail <id>" . PHP_EOL;
        echo "Créer un contact : create <name>,<email>,<phone_number>" . PHP_EOL;
        echo "Modifier un contact : modify <id>,<name>,<email>,<phone_number>" . PHP_EOL;
        echo "Supprimer un contact : delete <id>" . PHP_EOL;
        echo "Quitter le programme : quit" . PHP_EOL;
        echo "Afficher l'aide : help" . PHP_EOL;
    }

    /**
     * Modifie les informations d'un contact existant.
     */
    public function modify(
        int $id,
        string $name,
        string $email,
        string $phoneNumber
    ): void {
        $dbConnect = new DBConnect();

        $contactManager = new ContactManager($dbConnect->getPDO());

        $contactManager->modify($id, $name, $email, $phoneNumber);
    }
}