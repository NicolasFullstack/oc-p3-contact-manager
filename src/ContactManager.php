<?php
require_once 'Contact.php';
class ContactManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function findAll(): array
    {
        // Implementation for finding all contacts
        $result = $this->pdo->query("SELECT * FROM contact");
         
        $rows = $result->fetchAll();

$contacts = [];
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

    public function findById(int $id): Contact
    {
        $requete = $this->pdo->prepare
        ("SELECT * FROM contact WHERE id = :id");

        $requete->execute(['id' => $id]);

        $row = $requete->fetch();

        $contact = new Contact();

        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhoneNumber($row['phone_number']);

        return $contact;
    }
}

















