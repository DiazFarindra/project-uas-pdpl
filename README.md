# Laravel MVC Architecture with Singleton Design Pattern

## MVC Architecture

MVC stands for Model-View-Controller. It is a software design pattern that divides the program logic into three interconnected elements. This is done to separate internal representations of information from the ways that information is presented to and accepted from the user.

### Implementation of MVC Architecture

- Model: The Model represents the data and the business logic of the application, implemented on: `/app/Models`.
- View: The View represents the UI of the application, implemented on: `/resouurces/views`.
- Controller: The Controller acts as an interface between Model and View, implemented on: `/app/Http/Controllers`.

## Singleton Design Pattern

Singleton pattern is one of the simplest design patterns in Java. This type of design pattern comes under creational pattern as this pattern provides one of the best ways to create an object. This pattern involves a single class which is responsible to create an object while making sure that only single object gets created. This class provides a way to access its only object which can be accessed directly without need to instantiate the object of the class.

### Implementation of Singleton Design Pattern

- Singleton: The Singleton class is responsible for creating an object of the class, implemented on: `/app/Contracts`, `/app/Services`, `/app/Providers/AppServiceProvider.php`.

## Quick Start

- Clone or download the repository

- Install the dependencies

    ```bash
    composer install
    ```

- Create a copy of your .env file

    ```bash
    cp .env.example .env
    ```

- Generate an app encryption key

    ```bash
    php artisan key:generate
    ```

- run migration

    ```bash
    php artisan migrate
    ```

- run seeder

    ```bash
    php artisan db:seed
    ```

- Start the server

    ```bash
    php artisan serve
    ```
