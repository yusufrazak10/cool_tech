## Prerequisites

Ensure you have the following installed:

**PHP**: 8.0.2 or higher (Recommended version: 8.0.2+ for Laravel 8.x)
**MySQL**: 5.7 or higher (Recommended version: 5.7+ for compatibility with Laravel)
**Composer**: 2.x (for managing PHP dependencies)
**Node.js**: Required for frontend assets (if applicable)

## Install PHP

To install PHP, you can either download it directly from the official PHP website or use a package manager like Homebrew on macOS.

Download PHP: PHP Downloads
Install PHP via Homebrew:
brew install php
Install MySQL

MySQL is the database management system required for this Laravel application. You can either download it from the official website or install it using Homebrew on macOS.

Download MySQL: MySQL Downloads
Install MySQL via Homebrew:
brew install mysql
Start MySQL Service: After installation, you need to start the MySQL service:
brew services start mysql
Install Composer

Composer is a dependency manager for PHP. It is required to install the Laravel dependencies.

Download Composer: Composer Downloads
Install Composer via Homebrew:
brew install composer
Clone the Repository

Once you have all the prerequisites installed, you need to clone the Laravel blog project repository to your local machine.

git clone https://github.com/your-username/your-laravel-blog.git
cd your-laravel-blog
Setup and Configuration

Duplicate .env.example
Copy the .env.example file and rename it to .env.

cp .env.example .env
Configure Database Credentials
Open the .env file and enter your database credentials (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD) to match your local MySQL setup.

Example:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password
Generate Application Key
Run the following command to generate the application key:

php artisan key:generate
Database Setup

Import the SQL Dump
Import the cool_tech_dump.sql file into your MySQL database. You can do this by running the following command:

mysql -u root -p your_database_name < path/to/cool_tech_dump.sql
Make sure to replace your_database_name with the name of your database and provide the correct path to the .sql file.

Run the Application

To start the development server, run:

php artisan serve
Access the Application

Once the server is up, you can navigate to the displayed URL (usually http://localhost:8000) in your browser to access the application.
