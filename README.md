# Keep Tabs

This project was built using Laravel, Blade, Tailwind CSS and Breeze

### Prerequisites

What things you need to install the software and how to install them.

![](https://img.shields.io/badge/PHP-v7.4-blue.svg)
![](https://img.shields.io/badge/MYSQL-v5.7-green.svg)
![](https://img.shields.io/badge/APACHE-v2.5-yellow.svg)

Use one of these softs according to your OS :

-   **Windows** : Use WAMP, XAMP or Laragon
-   **Mac OS**: Use MAMP (PRO)
-   **Linux**: Use LAMP

## Installing

**First, finish reading this file and check about the 'database connection' and 'default admin'**

To start configuring the project, follow this commands

Install composer dependencies

```
composer install
```

Create .env file

```
cp .env.example .env
```

Generate key

```
php artisan key:generate
```

Install npm dependencies

```
npm install
```

Generate styles and javascripts, the page will auto reload.

```
npm run watch
```

Generate ES5 file for Internet Explorer compatibility.
```
npm run gulp:watch
```

Run migrations

```
php artisan migrate
```

Refresh the database and run all database seeds...

```
php artisan migrate:refresh --seed
```

Clear cache
```
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan clear-compiled
php artisan config:cache
```

## Database Connection

The project use a MySQL database.

Use one of these softs according to your OS to connect to the database :

-   **Windows** : Use Heidi SQL
-   **Mac OS**: Use Sequel Pro
-   **Linux**: Use Heidi SQL

Up to you to modify these values according to your environment on the .env file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=''
DB_USERNAME=root
DB_PASSWORD=root
```

##  Default Admin User

In order to create a default admin login, before the app deployment, go to your .env file and edit:
```    
ADMIN_NAME=
ADMIN_EMAIL=
ADMIN_PASSWORD=
```
Then run
```
php artisan db:seed --force
```

## TO DO
- Completely redo the visual part
- 'Projects' - See the total already paid for that project;
- 'Projects' - See how much is left to pay for that project;
- When editing a project or payment, see the current values on date fields;
- Change from CKEditor to TinyMCE
- Add a 'To Do' area

## Running the tests

Not yet implemented

## Deployment

Not yet implemented

## Contributing

Not yet implemented

## Versioning

Not yet implemented
