# Ivd24RestApi

cd Ivd24RestApi

composer install

// environment config ----

// .env

APP_ENV=prod

DATABASE_URL=mysql://root:vuanh123@127.0.0.1:3306/db001_portal 

// run server

php -S localhost:8000 -t public/

// rest api ...

http://localhost:8000/url-to-service


// rest client

Ivd24\Command\ObjectClientCommand

https://github.com/hong1234/Ivd24RestApi/blob/main/src/Command/ObjectClientCommand.php
