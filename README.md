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