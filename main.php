<?php

require_once 'src/DBConnect.php';
require_once 'src/ContactManager.php';
require_once 'src/Command.php';

while (true) {
    $line = readline("Entrez votre commande : ");
    $commandFound = false;

 if ($line === 'list') {
    $commandFound = true;
    $command = new Command();
    $command->list();
}

if (preg_match('/^detail ([0-9]+)$/', $line, $matches)) 
{
$commandFound = true;
    $command = new Command();

    $command->detail($matches[1]);
}

if (preg_match('/^create (.+),(.+),(.+)$/', $line, $matches)) 
{
$commandFound = true;
$command = new Command();

    $command->create(
        $matches[1],
        $matches[2],
        $matches[3]
    );
}


    if (preg_match('/^modify ([0-9]+),(.+),(.+),(.+)$/', $line, $matches)) {

        $commandFound = true;
        $command = new Command();

        $command->modify(
            $matches[1],
            $matches[2],
            $matches[3],
            $matches[4]
        );
    }


if (preg_match('/^delete ([0-9]+)$/', $line, $matches)) {

$commandFound = true;
    $command = new Command();

    $command->delete($matches[1]);
}


if ($line === 'quit') {
    $commandFound = true;
    echo "Au revoir !" . PHP_EOL;
    break;
}


if ($line === 'help') {
    $commandFound = true;
    $command = new Command();
    $command->help();
}

    }

    if (!$commandFound) {
    echo "Commande inconnue ou mal formatée. Tapez help pour voir les commandes disponibles." . PHP_EOL;
}
