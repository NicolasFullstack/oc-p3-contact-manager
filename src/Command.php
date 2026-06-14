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
}
