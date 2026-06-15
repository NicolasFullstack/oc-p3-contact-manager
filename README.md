# Contact Manager

Projet réalisé dans le cadre de la formation **Développeur d'Application PHP/Symfony** OpenClassrooms.

## Description

Cette application en ligne de commande permet de gérer une liste de contacts stockés dans une base de données MySQL.

Fonctionnalités disponibles :

* Afficher tous les contacts (`list`)
* Afficher le détail d'un contact (`detail <id>`)
* Créer un contact (`create <name>,<email>,<phone_number>`)
* Modifier un contact (`modify <id>,<name>,<email>,<phone_number>`)
* Supprimer un contact (`delete <id>`)
* Afficher l'aide (`help`)
* Quitter l'application (`quit`)

## Prérequis

* PHP 8 ou supérieur
* MySQL
* XAMPP (ou équivalent)

## Configuration de la base de données

Le projet a été développé avec la configuration locale suivante :

* Hôte : `localhost`
* Base de données : `projet3_contacts`
* Utilisateur : `root`
* Mot de passe : vide (configuration XAMPP par défaut)

Si votre configuration est différente, adaptez les paramètres du fichier `DBConnect.php`.

## Configuration de PHP

L'application se lance avec la commande :

php main.php

PHP doit donc être installé sur votre machine et accessible depuis le terminal.

Pour vérifier que PHP est correctement configuré :

php -v

Si la version de PHP s'affiche, vous pouvez lancer l'application.

Sous Windows avec XAMPP, il peut être nécessaire d'ajouter le dossier suivant à la variable d'environnement PATH :

C:\xampp\php

## Installation

1. Cloner le dépôt :

```bash
git clone https://github.com/NicolasFullstack/oc-p3-contact-manager.git
```

2. Créer la base de données `projet3_contacts`.

3. Importer la table `contact` contenant les champs :

* id
* name
* email
* phone_number

4. Vérifier les paramètres de connexion dans `DBConnect.php`.

## Lancement

Depuis le dossier du projet :

```bash
php main.php
```

## Exemple d'utilisation

```text
help
list
detail 1
create Gandalf,gandalf@istari.com,0102030405
modify 1,Gandalf le Blanc,gandalf@istari.com,0102030405
delete 1
quit
```

## Auteur

Nicolas Bestieu
Projet OpenClassrooms - Gestionnaire de contacts en ligne de commande.
