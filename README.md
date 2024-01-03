##Blog Test Project

The Blog Test Project is a Laravel-based web application that enables users to register, log in, create, edit, and delete posts. Users can also comment on posts and manage their own comments. The application includes a search feature for finding content based on titles, posts, or comments.
Getting Started
Prerequisites

    Composer
    Laravel

Installation

    Clone the Repository:

    bash

git clone <repository_url>

Navigate to the Project:

bash

cd blog-test-project

Install Dependencies:

bash

composer install

Environment Setup:

bash

cp .env.example .env

Update the .env file with your database credentials.

Generate Application Key:

bash

php artisan key:generate

Run Migrations:

bash

php artisan migrate

Seed Database:

bash

    php artisan migrate --seed

Testing

Run unit tests:

bash

php artisan test

Usage

    Accessing the Project:

    For macOS users with Valet: http://blog.test.

    User Actions:
        Register and log in to your account.
        Create, edit, and delete posts.
        Add and manage comments on posts.

    Search Functionality:
        Utilize the search box to find posts or comments.

Example Images

Contributing

Feel free to contribute by forking the repository and submitting pull requests.
License

This project is licensed under the MIT License.

