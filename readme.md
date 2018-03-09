## Laravel Blog

This is a sample blog application which is built using Laravel, jQuery and jQueryUI 

#### Features

- [x] Users use form to submit new post. Title is unique
- [x] Show list of posts (on home page)
- [x] Click post title to view post details (full body content, created & updated date)
- [x] Post content supports markdown
- [x] Only authenticated users could write posts
- [x] Post list is paginated
- [x] Post details are retrieved using AJAX
- [x] Only posts approved by Admin are shown

#### Prerequisites
- php 7.0 or higher
- [composer](https://getcomposer.org/)
- mysql 5.6 or higher

#### Install guide
- Clone this repo
```
git clone https://github.com/xamenyap/laravel-blog.git
```
- Navigate to the project folder and install all composer dependencies
```
composer install
```
- Create `.env` (using `.env.example`), then update the required credential for your database
- Run migrations and seeders to populate the app with some dummy data
```
php artisan migrate
php artisan db:seed
```
- There are 2 user accounts made specifically for testing. One has admin role (login with `admin@demo.com/123456`), and the other just member role (login with `demo@demo.com/123456`).  
- For simple testing purpose, run a php built-in server
```
php -S localhost:8080 -t public/
```
- Then access your localhost server at `http://localhost:8080/`