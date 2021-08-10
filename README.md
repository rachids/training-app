# Training app

Petite appli pour garder une trace des mes exploits physiques.

Il n'y a pas d'authentification ni de grandes mesures de sécurité, cette appli tourne sur un raspberry-pi.
Elle a été pensée pour le téléphone afin de prendre en note les répétitions directement après les avoir faites.

Si on y accède par autre qu'un petit écran, un bouton _"Exercices"_ apparaît permettant d'accéder au CRUD des exercices et d'en ajouter/modifier/supprimer.

## Aperçu
![Mobile](https://imgur.com/e9VGx4b.jpg)

## Installation
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed` (optional)
- `npm install`
- `npm run dev`

