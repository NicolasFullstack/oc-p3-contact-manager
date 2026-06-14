<?php

class Command
{
public function list(): void
{
     $dbConnect = new DBConnect();

     $contactManager = new ContactManager($dbConnect->getPDO());

    $contacts = $contactManager->findAll();

     foreach ($contacts as $contact) 
        {echo $contact->toString() . PHP_EOL;}
}


public function detail(int $id): void
{
    
     $dbConnect = new DBConnect();

     $contactManager = new ContactManager($dbConnect->getPDO());

    $contact = $contactManager->findById($id);

    echo $contact->toString() . PHP_EOL;
}


public function create(string $name, string $email, string $phoneNumber): void
{
    $dbConnect = new DBConnect();

$contactManager = new ContactManager($dbConnect->getPDO());

$contactManager->create($name,$email,$phoneNumber);
}


public function delete(int $id): void
{
    $dbConnect = new DBConnect();

$contactManager = new ContactManager(
    $dbConnect->getPDO()
);
$contactManager->delete($id);
}


public function help(): void
{
   echo "Afficher la liste des contacts : list" . PHP_EOL; 
    echo "Afficher le détail d'un contact : detail <id>" . PHP_EOL;
    echo "Créer un contact : create <name>,<email>,<phone_number>" . PHP_EOL;
    echo "Modifier un contact : modify [id], [name], [email], [phone number]" . PHP_EOL;
    echo "Supprimer un contact : delete <id>" . PHP_EOL;
    echo "Quitter le programme : quit" . PHP_EOL;
    echo "Afficher l'aide : help" . PHP_EOL;    

}

public function modify(int $id,string $name,string $email,string $phoneNumber): void
{
$dbConnect = new DBConnect();

$contactManager = new ContactManager(
    $dbConnect->getPDO()
);
$contactManager->modify(
    $id,
    $name,
    $email,
    $phoneNumber
);
}
}
