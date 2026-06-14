<?php

require_once 'src/DBConnect.php';
require_once 'src/ContactManager.php';
require_once 'src/Command.php';

while (true) {
    $line = readline("Entrez votre commande : ");

 if ($line === 'list') {
    $command = new Command();
    $command->list();
}
}
    
