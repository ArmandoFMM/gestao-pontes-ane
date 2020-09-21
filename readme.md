# Web API + Dasbhoard App
## Web API that expose data for Mozambican bridges inspections, wich is consumed by a React Native app. An APK of the React native app can be the downloaded [Here](https://drive.google.com/open?id=1X2iQCCQtDBUK0HoalQjSgRtyumDORh3L)

## Web App that acts as a dashboard to manage bridges inspections data.

Demo at [Heroku](https://sgp-ane.herokuapp.com)

User: ```admin@ane.gov.mz```

Pass: ```secret```

Developed in Laravel

clone the project

```composer install```

```cp .env.example .env```

configure your database on your env file

```php artisan key:generate```

```php artisan serve```

go to http://localhost:8000