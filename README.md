## Website for the Mount Zion University Institute
The website is aimed at advertizing the institution and providing an easier access to its students, staff, partners and anyone on the internet.
The website will also serve as a means to manage the following processes:-

- Academics including faculties, departments, programs
- Online admission of new students
- Events and news about the school etc
It will also provide a secured admin panel for the administrators to facilitate their work.

### Framework used
- Laravel 11.0

### Package used
- Laravel Breeze with blade syntax for authentication
- Wordpress theme for main website structure
- 
### Server Requirements
- PHP ^8.2
- MySQL 8.0
 
### How to start locally
- Clone or download the project using the link; the latest code is on the *master* branch
- Open it in your favourite IDE and run `composer install`
- Run `npm install and npm build` to install and run the blade templates used for authentication and admin panel 
- Run `cp .env.example .env`
- Generate the app key by running `php artisan key: generate`
- Set up your database connection in your *.env* file
- Run the migration using the command `php artisan migrate`
- Enable dynamic reload of admin panel using `npm run dev`
- Serve the application using `php artisan serve` and visit **http://localhost:8000**  

 


