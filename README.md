# Choix Prealables

Après une lecture horizontale des consignes, j'ai pris la décision d'utiliser **DataTables** et **Bootstrap** pour l'affichage des listes. Cela simplifie la création de listes qui seront ergonomiques, performantes et esthétiques, tout en rendant le projet plus scalable.

# Récapitulatif - Etape 1
## Objectif : 
Afficher le contenu spécifique d’un client selon un cookie (clienta, clientb, clientc).

## Technologies utilisées :
jQuery : Pour la gestion dynamique du contenu.
Cookies : Pour déterminer le client actif.
Data Attributes : Utilisation de data-module et data-script dans dynamic-div pour charger dynamiquement le contenu.

## Méthode :
Le bouton pour chaque client définit un cookie correspondant.
Lorsqu'un client est sélectionné, un appel AJAX charge le fichier PHP associé au client via ajax.php.
Le contenu du fichier est inséré dynamiquement dans la div.dynamic-div.


# Récapitulatif - Etape 2
## Objectif : 
Afficher dynamiquement la liste des voitures en fonction du client avec DataTables.

## Technologies utilisées :
DataTables : Pour la gestion de la table dynamique (recherche, tri, pagination).
AJAX : Pour récupérer et afficher les données des voitures sans recharger la page.

## Méthode :
DataTables est utilisé pour rendre la table des voitures interactive avec des fonctionnalités de recherche, tri, et pagination.
La table est remplie avec les donnees du fichiers cars.json en fonction du client en cours.
La table est configurée avec un fichier de traduction pour avoir les boutons ,infos , ... En francais

# Récapitulatif - Etape 3
## Objectif : Afficher une vue détaillée d’une voiture.

## Méthode :
Lorsqu’une voiture est sélectionnée, son ID est passé à edit.php via AJAX.
Le contenu est chargé dynamiquement dans la div.dynamic-div.
Les informations de la voiture (modèle, marque, année, puissance, couleur, garage) sont affichées.
Le retour à la liste des voitures se fait sans recharger la page, en réutilisant AJAX.


# Récapitulatif - Étape 4
## Objectif :
Ajouter un module Garage pour le client B, permettant d’afficher une liste de garages et leurs détails. Le module doit être dynamique, sans recharger la page.

## Méthode :

Affichage des garages et detail :
Le module Garage reprend le principe du module cars adapte aux donnees des garages.

Changement dynamique de contenu :
Le module change dynamiquement sans recharger la page, on garde le principe des boutons mais avec un select qui au changement de valeur va modifier le data-attibute du bouton pour avoir le bon module.

Ce select n'est visible que par le clientb pour plus de coherence.


# Récapitulatif - Étape 5
## Objectif :
Appliquer des couleurs spécifiques aux voitures dans la vue liste :

Rouge pour les voitures de plus de 10 ans.
Verte pour celles de moins de 2 ans.

## Méthode :
Calcul de l'âge des voitures :
Je récupère le timestamp de la voiture puis calcule l'âge en années en soustrayant la date actuelle au timestamp de l'année des data.

Application des couleurs :
Pour chaque voiture, une classe CSS est appliquée à la ligne de la dataTable.

Pour avoir des exemples j'ai modifie les annees de 2 voitures


# Etape 6 : Secriser les donnees
Les problemes potentiels : 

1. Accès aux fichiers JSON sans autorisation : Les données client sont stockées en clair dans des fichiers JSON, accessibles si le serveur est mal configuré.
2. Vol de données via le cookie client : Le cookie utilisé pour identifier le client peut être intercepté ou falsifié si la connexion n’est pas sécurisée (par exemple, via HTTPS).
3. Vulnérabilité au vol de session : Si les cookies de session ne sont pas correctement protégés (par exemple, sans attribut HttpOnly ou Secure), un attaquant pourrait voler une session valide.
4. Absence de validation de l'intégrité des fichiers JSON : Un attaquant pourrait modifier manuellement les fichiers JSON pour injecter de fausses données ou corrompre les informations du client.


Pour sécuriser les données des clients, on pourrait commencer par mettre en place un systeme d'authentification plus robuste pour s'assurer une premiere serrure d'acces à notre application

Ensuite, il serait préférable de remplacer les fichiers JSON par une base de données SQL ou noSQL, hébergée dans un environnement sécurisé et d'y accéder uniquement par des requêtes préparées pour éviter les injections SQL.

Si l'utilisation d'une base de données n'est pas possible, il est essentiel de sécuriser les fichiers JSON en configurant le fichier .htaccess pour empêcher l'accès direct, en utilisant le système d'authentification pour restreindre l'accès aux fichiers sensibles ou encore en chiffrant ces fichiers.