### Installation
```bash
xu@calypso:~$ git clone git@github.com:boxfrommars/demo-rutorika-laravel-html.git
xu@calypso:~$ cd demo-rutorika-laravel-html/
xu@calypso:~$ composer update
xu@calypso:~$ chmod a+rw app/storage -R

// database creation
mysql> CREATE USER 'demohtml'@'localhost' IDENTIFIED BY 'demohtml';
mysql> CREATE DATABASE demohtml;
mysql> GRANT ALL PRIVILEGES ON demohtml . * TO 'demohtml'@'localhost';
mysql> FLUSH PRIVILEGES;

xu@calypso:~$ cp .env.example .env // create enviroment config file
xu@calypso:~$ vim .env // edit configuration (database connection, is local, etc.)

xu@calypso:~$ php artisan migrate
xu@calypso:~$ php artisan db:seed // test data. command for update: php artisan migrate:refresh --seed

// run development server. choose unused port
xu@calypso:~$ php artisan serve --port 8444 
```

Allmost all code is in `app/Http/routes.php`

Select2 Controller: `app/Http/Controllers/Select2Controller.php`