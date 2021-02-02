# Tekyn test

Nous attendons de toi que tu délivres une API permettant les opérations suivantes : 

 * La création des entités doctrine suivant le MCD joint.

Tu dois implémenter les 4 grandes opérations du CRUD, à savoir

 * Récupération d'un utilisateur
 * Création d'un utilisateur
 * Modification de l'intégralité de l'utilisateur
 * Modification du nom et/ou prénom et/ou age et/ou ville de l'utilisateur
 * Suppression de l'utilisateur

Attention : Le résultat attendu est une API, ne perd pas de temps avec du front, HTML ou Twig.

## Attendu

 * Un fichier README.md avec les explications comment exécuter ton projet
 * Le code de ton projet rendu sur le support de ton choix (mail, github, etc.)
 * Tout ce que tu as utilisé pour mener à bien ton test (URL, commandes php ou symfony, Dockerfile, makefile, etc.)

## Contraintes

 * Tu peux utiliser la version Symfony de ton choix, entre les version 3.4 et 5.2
 * Les versions de PHP autorisées sont les version >= 7.3

## Bonus (Pas de pénalisation si ce n'est pas fait)

 * Créer l'API doc correspondante au format nelmio/swagger
 * Ecrire les tests unitaires correspondants aux différentes opérations
     * TDD ou tests unitaires écrit par la suite, à toi de décider, précise juste la méthode utilisée
 * Utilisation des validators Symfony et/ou des forms Symfony
 * Ajout de log
 * Dockerfile ou docker-compose.yml permettant de monter la stack

## Critères de notation

 * Nous étudierons l'implémentation de ta solution selon les standards PHP et Symfony
 * Le nombre de bugs détectés
 * L'implémentation des entités Doctrine
 * Optimisation des requêtes et structure de base de données
 * La documentation de ton projet (PHPDoc, etc.)
