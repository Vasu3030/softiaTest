# Commencez par cloner le répertoire sur votre machine et rendez vous à l'intérieur

`git clone https://github.com/Vasu3030/softiaTest.git randomName`\
`cd randomName/SoftiaTest`

# Installez les dépendances manquantes

Si vous n'avez pas composer d'installé sur votre machine, faites ceci:
`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`\
`php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified';\ } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"`\
`php composer-setup.php`\
`php -r "unlink('composer-setup.php');"`\

`composer install` ou dans le cas où vous venez de l'installer juste au dessus `php composer.phar install`

# Configurez le .env et la base de données MySQL

## MysSQL

Si vous n'avez pas déjà installé MySQL sur votre machine, voici le lien pour : https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/

Une fois installé, si ce n'était pas déjà le cas, rendez vous sur la ligne de commande de MySQL :
`mysql -uroot -p`, rentrez le mot de passe que vous mis durant l'installation

Puis créez la base de donnée : `create database NomDeLaBaseDeDonnées;`

## .env

Créez un .env identique au .env.exemple, on changera ensuite quelques lignes pour pouvoir se connecter à la base de données : `cp -r .env.example .env`

Générez une nouvelle key pour le .env : `php artisan key:generate`

Remplissez ces lignes par vos informations : 

`DB_CONNECTION=mysql`\
`DB_HOST=127.0.0.1`\
`DB_PORT=3306`\
`DB_DATABASE=NomDeLaBaseDeDonnées`\
`DB_USERNAME=root`\
`DB_PASSWORD=MotDePasse`\

Normalement il suffit juste de changer la variable DB_DATABASE et DB_PASSWORD, peut être aussi DB_USERNAME si vous utilisez un autre user que root pour vous connecter à MySQL

## Effectuez les migrations ainsi que les seeders dans la base de données

`php artisan migrate:refresh --seed`

## Lancez le serveur et rendez vous sur le site

`php artisan serve`

Le terminal vous affichera l'url pour vous rendre sur le site, et vous pouvez maintenant avoir accès à tout.