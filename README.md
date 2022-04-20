### Git
git config --global user.name "RomainCrispini"
git config --global user.email "romain.crispini@gmail.com"
git init

### Composer
composer install
composer update

### Docker
symfony console make:docker:database

### Pré-requis

* PHP 7.4
* Composer
* Symfony (composer create-project symfony/website-skeleton my-project "5.4.*")
* Symfony CLI (brew install symfony-cli/tap/symfony-cli)
* Docker
* docker-compose

### Vérification
symfony check:requirements

### On lance l'ensemble des containers puis on lance un serveur sur Docker (env dev)
docker-compose up -d
symfony serve -d

## Erreur potentielle
Dans composer.json, downgrade 2.12 vers 2.11 : "doctrine/orm": "^2.11" et ajouter dans conflits "doctrine/orm": "^2.12"
Puis composer update