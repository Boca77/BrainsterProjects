<span style="font-size: 40px; font-weight: bold"> <span style="color:red ">MHRA</span> Admin Dashboard</span>

## Table of Contents

-   [About the Admin Dashboard](#about-the-admin-dashboard)
-   [Installation](#installation)
-   [Features](#features)
    -   [User Management](#user-management)
    -   [Content Management](#content-management)
    -   [Agenda Builder](#agenda-builder)
    -   [Page Settings](#page-settings)

## About the Admin Dashboard

The **Admin Dashboard** is a Laravel-based web application for administrators to manage users, content, settings, and more. Built on Laravel 11, the application includes user management, content moderation, and management.

## Installation

To install the Admin Dashboard locally:

1. Clone the repository:

    ```bash
    git clone https://git.brainster.co/Boris.Nachev-FS15/brainsterprojects-borisnachev_fs-15

    cd brainsterprojects-borisnachev_fs-15

    git checkout project_03
    ```

2. Install dependencies:

    ```bash
    composer install

    npm install && npm run dev
    ```

3. Copy the `.env` file and generate the application key:

    ```bash
    cp .env.example .env

    php artisan key:generate
    ```

4. Set up the database in `.env`:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=databaseName
    DB_USERNAME=username
    DB_PASSWORD=password
    ```

5. Run migrations, seeders, and create a symbolic link for storage:

    ```bash
    php artisan migrate --seed
    php artisan storage:link
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

## Features

### User Management

-   View all users.
-   Delete users.
-   Ban users.

### Content Management

-   Read, edit, and delete blogs, events, and conferences.
-   Agenda builder for separate events and conferences.
-   Manage event and conference speakers.
-   Page settings.

### Agenda Builder

-   CRUD operations for every event and conference.
-   To access the agenda builder, navigate through the conference or event to which you want to add an agenda.

### Page Settings

-   Change the hero image of the page.
-   Manage social media links.
-   CRUD for employees.
