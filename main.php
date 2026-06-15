<?php

/**
 * Point d'entrée de l'application.
 * Ce fichier gère la saisie utilisateur et l'exécution des commandes.
 */

require_once 'src/DBConnect.php';
require_once 'src/ContactManager.php';
require_once 'src/Command.php';

// Boucle principale de l'application.
while (true) {

    // Lecture de la commande saisie par l'utilisateur.
    $line = readline("Entrez votre commande : ");

    // Permet de vérifier si une commande valide a été trouvée.
    $commandFound = false;

    // Affiche la liste complète des contacts.
    if ($line === 'list') {
        $commandFound = true;

        $command = new Command();
        $command->list();
    }

    // Affiche le détail d'un contact à partir de son identifiant.
    if (preg_match('/^detail ([0-9]+)$/', $line, $matches)) {

        $commandFound = true;

        $command = new Command();
        $command->detail($matches[1]);
    }

    // Crée un nouveau contact.
    if (preg_match('/^create (.+),(.+),(.+)$/', $line, $matches)) {

        $commandFound = true;

        $command = new Command();

        $command->create(
            $matches[1],
            $matches[2],
            $matches[3]
        );
    }

    // Modifie les informations d'un contact existant.
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

    // Supprime un contact grâce à son identifiant.
    if (preg_match('/^delete ([0-9]+)$/', $line, $matches)) {

        $commandFound = true;

        $command = new Command();
        $command->delete($matches[1]);
    }

    // Ferme l'application.
    if ($line === 'quit') {

        $commandFound = true;

        echo "Au revoir !" . PHP_EOL;
        break;
    }

    // Affiche l'aide et la liste des commandes disponibles.
    if ($line === 'help') {

        $commandFound = true;

        $command = new Command();
        $command->help();
    }

    // Affiche un message si la commande est inconnue ou mal formatée.
    if (!$commandFound) {
        echo "Commande inconnue ou mal formatée. Tapez help pour voir les commandes disponibles." . PHP_EOL;
    }
}