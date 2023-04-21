# Les Veilleurs de Faune

Projet final de la formation Kercode : "Développeur intégrateur en réalisation d'applications
web" effectuée au sein du GRETA de Bretagne Sud (RNCP niveau 5).

Il s'agit d'un site fictif.

Concept global du site:
Il s'agit d'un observatoire qui référence les espèces animales menacées d'extinction en Bretagne. 
Les utilisateurs peuvent consulter les espèces menacées, aller dans la partie Observatoire qui permet de visualiser l'ensemble des observations réalisées sur ces mêmes espèces par les contributeurs.

Si l'utilisateur veut contribuer à devenir un veilleur de faune, à savoir ajouter des observations et alimenter l'observatoire, il crée un compte. Ainsi, il a accès à la partie Ajout d'une observation. 

### Technologies utilisées:

- HTML
- CSS (dont Bootstrap)
- PHP
- Javascript (dont jQuery, Ajax, et JSON)
- SQL

### Structure:

Le projet est structuré en architecture MVC (Model - View - Controller) contenu dans le dossier App.
Le dossier Public contient: la feuille de style **css**, les fonts, les images, et les scripts **javascript**.

Pour gérer les dépendances, Composer a été installé.

Il y a deux routeurs: 
1: ***index.php*** pour l'accès Front
2: ***admin.php*** pour l'administration du site. 

***BackOffice***
L'administrateur (role = 1) peut:
- ajouter, modifier, supprimer une catégorie,
- ajouter, modifier, supprimer une espèce,
- accéder aux observations ajoutées par les contributeurs,
- lire les messages envoyés par les utilisateurs via le formulaire de contact
- accéder à son compte et le modifier.

***Front***
Role = 0
Un utilisateur peut: 
- consulteur les espèces menacées, les observations faites par les contributeurs.
- contacter l'administrateur via le formulaire de contact.

Un utilisateur qui souhaite ajouter une observation doit créer un compte pour pouvoir:
-  visualiser son compte, le modifier ou le supprimer,
-  ajouter une observation.

### Installation:

Un diagramme MCD et le dump.sql de la base se trouve dans App/Models/database. 

Pour installer le projet: 

- récupérer tous les fichiers du repository
- créer une base de donnée et importer le dump.sql dans votre base de donnée
- Adaper le .env.example pour vous connecter à votre base de donnée et le renommer .env
- Installer composer et lancer la commande composer install dans le répertoire du site

Pour accéder aux différents comptes:
***BackOffice: Admin***
Accès au formulaire de connexion soit par la flèche près de la libellule: menu déroulant (se connecter) soit via le footer: espace administrateur. 
  - Pseudo : mache2023
  - Mot de passe : mache2023kercode
  
***Front: Utilisateur***
Accès au formulaire de connexion par la flèche près de la libellule: menu déroulant (se connecter)
  - Pseudo : unveilleurdu29
  - Mot de passe : unveilleurdu29
