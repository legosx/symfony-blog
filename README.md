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

## Admin role

Admin can Create, Read, Update and Remove posts.

![preview](https://i.imgur.com/Ys3IoqU.png)

![preview](https://i.imgur.com/7I9uE5U.png)

## Credentials

Admin:<br>
Email: admin@blog.de<br>
Password: admin

User:<br>
Email: user@blog.de<br>
Password: user
