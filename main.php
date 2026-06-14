<?php

require_once 'src/DBConnect.php';
require_once 'src/ContactManager.php';

while (true) {
    $line = readline("Entrez votre commande : ");

    if ($line === 'list') {
        $dbConnect = new DBConnect();
        $contactManager = new ContactManager($dbConnect->getPDO());

        $contacts = $contactManager->findAll();

        foreach ($contacts as $contact) {
    echo $contact->toString() . PHP_EOL;
}
    }
}