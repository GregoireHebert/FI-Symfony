# IFI Blog
Auteurs: benjamin Redant & jérémie Littiere
E Services FA

# Démarrage du projet:
Le projet se trouve dans le répéertoire /ifi
La DB se situe dans var/data.db
- pour lancer le serveur: php bin/console server:run


Si besoin de recréer la bdd une fixture a été crée pour l'initial Load.
Commandes pour la recréation de la BDD:
- php bin/console doctrine:database:create
- php bin/console make:migration
- php bin/console doctrine:migrations:migrate
- insert des fixtures: php bin/console doctrine:fixtures:load


## Travail effectué:
- Entities Article & Tag
- Page de création d'un article, accessible sur l'adresse `/blogpostss` en `GET`.
Elle comprend un formulaire permettant de soumettre un nouvel article.
Gestion des erreurs dans le formulaire.
- page accueil: accessible sur l'adresse `/` en `GET` et comprendra:
Une entête avec le nom du blog blog, une liste d'articles centrée avec les titres et sous-titre de chaque article.
Sous chaque sous-titre, un lien vers l'article.
- Page article: accessible sur l'adresse `/{id-de-l-article}` en `GET` et comprend:
Une entête avec le nom du blog, Le titre de l'article, Le corps de l'article et 
Un lien de retour vers la page d'accueil.

### Bonus effectués

- Ajouter Une pagination doit se trouver en pied de page.
- Ajouter des liens "articles suivants" et "articles précédents".
