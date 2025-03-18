# Choix Prealables

Après une lecture horizontale des consignes, j'ai pris la décision d'utiliser **DataTables** et **Bootstrap** pour l'affichage des listes. Cela simplifie la création de listes qui seront ergonomiques, performantes et esthétiques, tout en rendant le projet plus scalable.

# Récapitulatif - Etape 1 : Affichage du contenu du fichier avec le cookie
## Objectif : Afficher le contenu spécifique d’un client selon un cookie (clienta, clientb, clientc).

## Technologies utilisées :
jQuery : Pour la gestion dynamique du contenu.
Cookies : Pour déterminer le client actif.
Data Attributes : Utilisation de data-module et data-script dans dynamic-div pour charger dynamiquement le contenu.

## Méthode :
Le bouton pour chaque client définit un cookie correspondant.
Lorsqu'un client est sélectionné, un appel AJAX charge le fichier PHP associé au client via ajax.php.
Le contenu du fichier est inséré dynamiquement dans la div.dynamic-div.


# Récapitulatif - Etape 2 : Utilisation de DataTables pour l'affichage des voitures
## Objectif : Afficher dynamiquement la liste des voitures en fonction du client avec DataTables.

## Technologies utilisées :
DataTables : Pour la gestion de la table dynamique (recherche, tri, pagination).
AJAX : Pour récupérer et afficher les données des voitures sans recharger la page.

## Méthode :
DataTables est utilisé pour rendre la table des voitures interactive avec des fonctionnalités de recherche, tri, et pagination.
La table est remplie avec les donnees du fichiers cars.json en fonction du client en cours.
La table est configurée avec un fichier de traduction pour avoir les boutons ,infos , ... En francais

# Récapitulatif - Etape 3 : Affichage des détails d’une voiture
## Objectif : Afficher une vue détaillée d’une voiture.

## Méthode :
Lorsqu’une voiture est sélectionnée, son ID est passé à edit.php via AJAX.
Le contenu est chargé dynamiquement dans la div.dynamic-div.
Les informations de la voiture (modèle, marque, année, puissance, couleur, garage) sont affichées.
Le retour à la liste des voitures se fait sans recharger la page, en réutilisant AJAX.


# Récapitulatif - Étape 4 : Module Garage
## Objectif :
Ajouter un module Garage pour le client B, permettant d’afficher une liste de garages et leurs détails. Le module doit être dynamique, sans recharger la page.

## Méthode :

Affichage des garages et detail :
Le module Garage reprend le principe du module cars adapte aux donnees des garages.

Changement dynamique de contenu :
Le module change dynamiquement sans recharger la page, on garde le principe des boutons mais avec un select qui au changement de valeur va modifier le data-attibute du bouton pour avoir le bon module.

Ce select n'est visible que par le clientb pour plus de coherence.

