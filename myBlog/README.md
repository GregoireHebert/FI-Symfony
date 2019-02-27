Afrass'Blog realisé par ilias afrass
=====================================

- J'ai crée un bundle "TagBundle" dans namespace "Afrass" pour les Tag (bundle isolé).
- J'ai crée un bundle "AppBundle" pour les articles.
- Base de donnée SQLite "data.db".
- J'ai ajouté des tests pour l'ajout des tags en utilisant phpunit.

======================================

Lançer la commande `bin/console server:start` :

http://127.0.0.1:8000/tags.json => visualiser les tags.

http://127.0.0.1:8000/ => list des articles.

http://127.0.0.1:8000/?tag=tag => filtrer par tag vous pouvez filtrer en cliquant sur les tags.

http://127.0.0.1:8000/blogposts => creer nouveau article.

http://127.0.0.1:8000/1 => afficher l'article qui possede l'id = 1.

http://127.0.0.1:8000/1/edit => modifier l'article qui possede l'id = 1.

