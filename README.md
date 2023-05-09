This app is a web app that can be configured for a variety of purposes. Upon opening, users will see a login screen. If
they log in, they will be able to submit an application. If they log in with an admin username and password, they will
be able to manage all existing applications, including performing CRUD (Create, Read, Update Delete) actions. This application
was initially intended for vendors applying to be at an event, but it can be adapted for any application purpose, including
jobs, forming social clubs, teams, etc.

How to run the app (php files require running on a Webserver such as Apache, but I recommend installing XAMPP)

1) Install XAMPP;
2) Place the folder "Vendor" inside the "htdocs" folder;
3) Open XAMPP;
4) Start Apache;
5) Start Mysql;
6) Go to http://localhost/phpmyadmin/index.php;
7) Create a new database and call it: vendor;
8) Select "vendor" database and click on Import;
9) Select the file "vendor.sql" and Apply;
10) You will find the project here: http://localhost/Vendor/index.php;

---
If you need to configure the database connections, you can do it by opening the file: config.php
