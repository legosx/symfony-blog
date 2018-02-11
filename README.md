# Symfony Blog

Simple example of blog application with using Symfony

## To Run:

~~~
composer install
~~~

Create DB:

~~~
php bin/console doctrine:database:create
~~~

Create tables:

~~~
php bin/console doctrine:schema:create
~~~

Import data:

~~~
php bin/console doctrine:fixtures:load
~~~

Run server:

~~~
php bin/console server:run
~~~

Open http://localhost:8000

## User role

User can see only post list in two languages.

![preview](https://i.imgur.com/eZT0IgK.png)

## Credentials

Admin:
Email: admin@blog.de
Password: admin

User:
Email: user@blog.de
Password: user
