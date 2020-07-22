# Info

Afin de rejoindre l'équipe de Subskill, un projet nous a été proposé.
J'ai donc décidé de me lancer sur un projet Symfony4.
(Malheureusement je n'ai pas réaliser le projet en entier, il reste donc en DEV pour le moment.)

# Installation

Pour commencer, rendez vous dans le dossier htdocs de votre MAMP.

```bash
/Applications/MAMP/htdocs/
```

Cloner le projet

```bash
git clone https://github.com/Starwox/subskill.git
```

Une fois le projet récupéré, accéder au projet, et installer les dépendances

```bash
cd subskill/
composer install
```

Il vous faudra modifier le fichier .env

```bash
DATABASE_URL=mysql://root:admin@127.0.0.1:3306/subskill

SQL
root = Login
admin = password
```

Nous pouvons donc démarrer le projet ! (N'oubliez pas de lancer MAMP)

```bash
symfony server:start
```

# Les routes

Liste de toutes les routes du projet, ainsi que leurs utilitées

## Catégories

```bash
category      -    /category/{title} 
```
Le {title} est à remplacer par le nom de la catégorie que vous souhaitez créée.

```bash
get_category      -   /category/{id} 
```
Le {id} est a remplacé par l'ID que vous souhaitez vérifier.


## Articles

```bash
article       -    /article/create/{id} 
```
Le {id} est a remplacé par l'ID de la catégorie que vous souhaitez associer à votre article.

```bash
article_edit  -    /article/edit/{id}-{$img} 
```

Permet de modifier le nom de l'image

{id} :  Insérer l'ID de l'article
{img}:  Insérer le nouveau nom de l'image

```bash
article_details    -    /article/details/{id}
```
Cette page est accessible depuis la page d'accueil, elle affiche la page détaillée de l'article sélectionné.

## Users

```bash
users_create     -    /users/create 
```
Cette page est le formulaire de contact.
Malheureusement je n'ai pas eu le temps de la terminer.

# Remerciement

Je tiens à remercier l'équipe de Subskill pour ce projet, qui m'a permis de découvrir certaines fonctionnalitées à ajouter.
(remontée de post du réseau social & filtre des catégories)
