# Product API

## Introduction

This is a simple RESTful API built with Laravel for managing products. The API supports CRUD operations on products.

## Requirements

- PHP 7.2.5 or higher
- Composer
- MySQL or any other supported database

## Setup Instructions

1. Clone the repository:
    ```bash
    git clone https://github.com/mdfiroz995/product-user-management.git
    cd product-api
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy the `.env.example` file to `.env` and configure your database settings:
    ```bash
    cp .env.example .env
    ```

4. Generate an application key:
    ```bash
    php artisan key:generate
    ```

5. Run the database migrations:
    ```bash
    php artisan migrate
    ```

6. Run the tests:
    ```bash
    php artisan test
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

## API Endpoints

- `GET /api/products`: Retrieve a list of all products.
- `GET /api/products/{id}`: Retrieve a specific product by ID.
- `POST /api/products`: Create a new product.
- `PUT /api/products/{id}`: Update an existing product by ID.
- `DELETE /api/products/{id}`: Delete a product by ID.



# User Management System

## Introduction

This is a User Management System built with Laravel, featuring user authentication, registration, profile management, and an admin panel.

## Requirements

- PHP 7.2.5 or higher
- Composer
- MySQL or any other supported database
- Node.js & npm

## Setup Instructions

1. Clone the repository:
    ```bash
    git clone https://github.com/mdfiroz995/product-user-management.git
    cd user-management
    ```

2. Install dependencies:
    ```bash
        composer install
        npm install
        npm run dev
    ```

3. Copy the `.env.example` file to `.env` and configure your database settings:
    ```bash
    cp .env.example .env
    ```

4. Generate an application key:
    ```bash
    php artisan key:generate
    ```

5. Run the database migrations:
    ```bash
    php artisan migrate --seed
    ```

6. Run the development server:
    ```bash
    php artisan serve
    ```

## Features

- User Registration and Login
- User Profile Management
- Admin Panel for managing users
- Admin can update,view & delete All users.

## Routes

- `/register`: User registration
- `/login`: User login
- `/profile`: View and edit user profile
- `/admin`: Admin panel (requires admin role)

- `GET /admin/users`: Retrieve a list of all users.
- `GET /admin/users/{users}`: Admin can retrieve a specific user by ID.
- `PUT /admin/users/{users}`: Admin update an existing user by ID.
- `DELETE /admin/users/{users}`: Admin delete a user by ID.