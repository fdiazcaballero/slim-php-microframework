## Synopsis

This is a sample project to test a nice PHP microframework: Slim.

## Installation

-This project is using Slim Framework  
http://www.slimframework.com/  

-You can extract it into a directory.  

-You can set up you database by running the file billingtest.sql in your phpMyAdmin  

-Before running it please update your database connection settings in the default
parameters of the BillingUtil constructor (line 19 of src/BillingUtil.php) or
pass them in when creating the BillingUtil object (line 14 of src/routes.php).  

-You can now run it with PHP's built-in webserver:  
$ cd [app-dir]; php -S 127.0.0.1:8080 -t public public/index.php  

-Then you can use it just entering 127.0.0.1:8080 in your browser.

## Contributors

Fernando Diaz Caballero fdiazcaballero@gmail.com  

## License

GNU GENERAL PUBLIC LICENSE