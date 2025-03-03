# Cool Tech Website - Project Overview

**Cool Tech** specializes in delivering digestible tech-related content for popular consumer consumption. Their current website, though simple, is unable to handle their growing needs. The new website aims to feature additional functionality and offer a more robust structure to accommodate their expanding audience and content.

**Core Features of the New Website:**
- Four main article categories:
  - Tech News
  - Software Reviews
  - Hardware Reviews
  - Opinion Pieces
- Improved article categorization and tagging for better SEO and content discoverability.
- Features to distinguish between article categories, with a seamless navigation experience.

---

## Purpose

The purpose of this project is to build a dynamic, feature-rich website for **Cool Tech**. It will support content categorization, article tagging, and provide a more interactive and user-friendly experience for a growing user base. The new website will also feature:

- A **home page**
- **Article view pages**
- **Category view pages**, where only articles of a specific category are listed.
- **Tag view pages**, showcasing articles relevant to specific tags.
- An **About Us** page.
- A **Legal page** (including Terms of Use and Privacy Policy).

---

## Prerequisites

Make sure you have the following installed:

- **PHP**: 8.0.2 or higher (Recommended: 8.0.2+ for Laravel 8.x)
- **MySQL**: 5.7 or higher (Recommended: 5.7+ for Laravel compatibility)
- **Composer**: 2.x (for managing PHP dependencies)
- **Node.js**: Required for frontend assets (if applicable)

---

## Installation Steps

1. **Install PHP**  
   You can download PHP directly or use a package manager like Homebrew for macOS.  
   - [PHP Downloads](https://www.php.net/downloads)  
   - **Install with Homebrew:**

     ```bash
     brew install php
     ```

2. **Install MySQL**  
   - [MySQL Downloads](https://dev.mysql.com/downloads/installer/)  
   - **Install with Homebrew:**

     ```bash
     brew install mysql
     brew services start mysql
     ```

3. **Install Composer**  
   - [Composer Downloads](https://getcomposer.org/download/)  
   - **Install with Homebrew:**

     ```bash
     brew install composer
     ```

4. **Clone the Repository**

   ```bash
   git clone https://github.com/your-username/your-laravel-blog.git
   cd your-laravel-blog
   
# Set Up Configuration

Duplicate .env.example and rename it to .env:

cd .env.example .env

Configure Database

Open .env and update the database credentials:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_database_name

DB_USERNAME=root

DB_PASSWORD=your_password

# Generate Application Key

php artisan key:generate

# Import the Database Dump

Import the provided SQL dump into MySQL:

mysql -u root -p your_database_name < path/to/cool_tech_dump.sql

# Run the Application

Start the development server:

php artisan serve

Access the Website

Open your browser and navigate to the URL (usually http://localhost:8000) to see the site in action.
