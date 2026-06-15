<?php

require_once 'Contact.php';

/**
 * Gère toutes les opérations CRUD sur les contacts.
 */
class ContactManager
{
    private PDO $pdo;

    /**
     * Initialise le manager avec une connexion PDO.
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Récupère l'ensemble des contacts de la base de données.
     */
    public function findAll(): array
    {
        $result = $this->pdo->query("SELECT * FROM contact");

        $rows = $result->fetchAll();

        $contacts = [];

        // Transformation des lignes SQL en objets Contact.
        foreach ($rows as $row) {
            $contact = new Contact();

            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhoneNumber($row['phone_number']);

            $contacts[] = $contact;
        }

        return $contacts;
    }

    /**
     * Récupère un contact à partir de son identifiant.
     */
    public function findById(int $id): Contact
    {
        $requete = $this->pdo->prepare(
            "SELECT * FROM contact WHERE id = :id"
        );

        $requete->execute(['id' => $id]);

        $row = $requete->fetch();

        $contact = new Contact();

        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhoneNumber($row['phone_number']);

        return $contact;
    }

    /**
     * Ajoute un nouveau contact dans la base de données.
     */
    public function create(string $name, string $email, string $phoneNumber): void
    {
        $requete = $this->pdo->prepare(
            "INSERT INTO contact (name, email, phone_number)
             VALUES (:name, :email, :phone_number)"
        );

        $requete->execute([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phoneNumber
        ]);
    }

    /**
     * Supprime un contact grâce à son identifiant.
     */
    public function delete(int $id): void
    {
        $requete = $this->pdo->prepare(
            "DELETE FROM contact WHERE id = :id"
        );

        $requete->execute([
            'id' => $id
        ]);
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
        $requete = $this->pdo->prepare(
            "UPDATE contact
             SET name = :name,
                 email = :email,
                 phone_number = :phone_number
             WHERE id = :id"
        );

        $requete->execute([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'id' => $id
        ]);
    }
}