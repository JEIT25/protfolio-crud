# Portfolio Website with Client Accound CRUD Operations

Welcome to the Portfolio Website with Client Account CRUD Operations. This project aims to demonstrate Cread, Read, Update,Delete (CRUD) on the accounts of the clients.

# Member
1. **Jerold Amora**

## Description

This system integrates a portfolio website with CRUD (Create, Read, Update, Delete) functionalities for client accounts. Potential clients can create accounts,read accounts(login & show account information),update account information and credentials, and delete account. To be specific the CRUD Functionalities are applied to client users for them to hire the portfolio owner.

## Installation

To set up the system locally, follow these steps:

1. **Download XAMPP:** 
   Download and install XAMPP, a free and open-source cross-platform web server solution stack package developed by Apache Friends. XAMPP includes Apache HTTP Server, MariaDB database, and interpreters for scripts written in the PHP and Perl programming languages.

2. **Download Google File Folder or Download Zip File in GITHUB Repository:**
   Google Drive : https://drive.google.com/drive/folders/10SZvYbdps1kYbWq8ALD2cTP43mVsDQFK?usp=sharing
   GITHUB REPO: https://github.com/JEIT25/protfolio-crud.git

3. **Import SQL File:**
In your web browser, open phpMyAdmin (typically accessible at `http://localhost/phpmyadmin`). Create a new database and import the included SQL file provided in the zip file, in the folder "database_sql_file", it is named "clients_db" . This will set up the necessary tables and data for the system to function properly.

4. **Configure Database Connection:**
Open the `config.php` file located in the root directory of the repository. Update the database connection settings to match your local environment. You'll typically need to modify the `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD`, and `DB_NAME` constants.

5. **Access the Website:**
Once the setup is complete, you can access the website index page by navigating to `http://localhost/Amora-personal-web-page/php/index.php` in your web browser.

## Usage

Upon accessing the website, users can:

- Browse through the portfolio owner's projects and services.
- Create an account to access additional features.
- Log in to their account to hire the portfolio owner.
- Autheticated users can update their first name ,last name, email and password.

## Folder Structure

The codebase follows a typical PHP web application structure:

- **`database_sql_file`:** contains the sql file containing the database for client accounts.
- **`php`:** contains all php file with html content.
- **`styles`:** contains the styles of the php files with html content.
- **`images`:** contains all images used by the php files with html content.

