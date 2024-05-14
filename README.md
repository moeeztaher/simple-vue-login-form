# Simple Vue Login Form

![Vue.js](https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vue.js&logoColor=4FC08D)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Demo](#demo)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
  - [Running the Application](#running-the-application)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)

## Introduction
This project is a simple login form built with Vue.js for the frontend and a PHP backend. It serves as a basic example of how to create a login form using Vue.js components and manage state with Vuex, along with a backend to handle authentication.

## Features
- Simple and clean login form UI
- Input validation
- State management with Vuex
- Responsive design
- Backend for authentication

## Demo
Check out the live demo [here](https://your-demo-link.com).

## Getting Started

### Prerequisites
- Node.js and npm installed on your machine
- Vue CLI
- PHP and Composer installed on your machine
- MySQL or compatible database

### Installation

#### Backend
1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/simple-vue-login-form.git
    ```
2. Navigate to the backend directory:
    ```bash
    cd simple-vue-login-form/backend
    ```
3. Install the PHP dependencies:
    ```bash
    composer install --ignore-platform-req=ext-fileinfo
    ```
4. Execute the `ddl.sql` file to set up the database schema:
    ```sql
    -- Open your MySQL client and run the following command:
    source path/to/ddl.sql;
    ```

#### Frontend
1. Navigate to the frontend directory:
    ```bash
    cd simple-vue-login-form/frontend
    ```
2. Install the dependencies:
    ```bash
    npm install
    ```

## Usage

### Running the Application

#### Backend
1. Start the PHP server:
    ```bash
    php -S localhost:8000 -t public
    ```

#### Frontend
1. Start the development server:
    ```bash
    npm run serve
    ```
2. Open your browser and navigate to `http://localhost:8080`.

## Configuration
Configuration details such as API endpoints or environment-specific variables can be set in the `.env` file for both frontend and backend.

### Backend Configuration
Update the `config.php` file with your database credentials:

```php
define('DB_HOST', 'your_db_host');
define('DB_NAME', 'your_db_name');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
Frontend Configuration
Update the .env file in the frontend directory:

VUE_APP_API_URL=http://localhost:8000/api
Contributing
Contributions are welcome! Please follow these steps to contribute:

Fork the repository.
Create a new branch (git checkout -b feature/your-feature).
Commit your changes (git commit -m 'Add some feature').
Push to the branch (git push origin feature/your-feature).
Create a new Pull Request.
License
This project is licensed under the MIT License. See the LICENSE file for details.
