# Blog Test Project
## Overview

The Blog Test Project is a Laravel-based web application designed for users to manage blog posts and comments. The project utilizes the Laravel framework, providing features such as user registration, login, post creation, editing, and deletion. Users can also comment on posts, with the added functionality to edit and delete their own comments. The search box enables users to find content based on titles, posts, or comments.
Prerequisites

Before you get started, make sure you have the following installed:
    
    Valet (for macOS users)

Installation

    git clone https://github.com/your-username/blog-test-project.git

Navigate to the project directory:

    cd blog-test-project

Copy the environment file and update the configuration:

    cp .env.example .env

Update the .env file with your database credentials.

Run database migrations:

    php artisan migrate

Seed the database with sample data:

    php artisan migrate --seed

Testing

Run unit tests:

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

    Image1: Link
    Image2: Link
    Image3: Link
    Image4: Link
    Image5: Link

Customization

Feel free to customize this project to suit your needs.
Contributing

Feel free to contribute by forking the repository and submitting pull requests.
License

This project is licensed under the MIT License.
