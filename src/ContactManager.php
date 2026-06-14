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

















}