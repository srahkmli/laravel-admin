# Laravel Admin Panel for Movie and User Management

This project is a simple Laravel-based admin panel that allows administrators to manage movies and users. It includes controllers for adding movies and managing user accounts.

## Features

- **Movie Management**: Admins can add, edit, and delete movie entries.
- **User Management**: Admins can manage users by adding, updating, or deleting their accounts.
- **Simple Authentication**: Basic authentication system to secure the admin panel.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 7.4
- Composer
- Laravel >= 8.0
- MySQL or another database supported by Laravel

## Installation

Follow these steps to get the project up and running:

1. **Clone the repository**

    ```bash
    git clone https://github.com/srahkmli/laravel-admin-movie-user.git
    cd laravel-admin-movie-user
    ```

2. **Install dependencies**

    Run the following command to install all necessary dependencies:

    ```bash
    composer install
    ```

3. **Set up environment variables**

    Duplicate the `.env.example` file and rename it to `.env`. Then, configure your database connection and other environment settings.

    ```bash
    cp .env.example .env
    ```

4. **Generate the application key**

    ```bash
    php artisan key:generate
    ```

5. **Run migrations**

    Run the migrations to set up the database tables.

    ```bash
    php artisan migrate
    ```

6. **Seed the database (optional)**

    Optionally, you can seed the database with some sample data:

    ```bash
    php artisan db:seed
    ```

7. **Start the development server**

    Start the Laravel development server:

    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://127.0.0.1:8000`.

## Usage

### Admin Panel

Once the server is running, you can access the admin panel by visiting `http://127.0.0.1:8000/admin`. The following pages are available:

- **Movies**: Manage movies, including adding, updating, or deleting movie entries.
- **Users**: Manage users, including adding, updating, or deleting user accounts.

### Controllers

1. **MovieController**: Manages the movie database. You can perform actions like adding new movies, editing movie details, and deleting movies.

    - **Method**: `POST /movies` to add a movie.
    - **Method**: `PUT /movies/{id}` to edit a movie.
    - **Method**: `DELETE /movies/{id}` to delete a movie.

2. **UserController**: Manages user accounts. You can add new users, edit their details, or delete them.

    - **Method**: `POST /users` to add a user.
    - **Method**: `PUT /users/{id}` to update user details.
    - **Method**: `DELETE /users/{id}` to delete a user.

### Authentication

The admin panel is protected by a simple authentication system. You can log in with the admin credentials.

## Routes

- `GET /admin`: The main dashboard.
- `GET /admin/movies`: Movie management page.
- `GET /admin/users`: User management page.
- `POST /admin/movies`: Create a new movie.
- `POST /admin/users`: Create a new user.
- `PUT /admin/movies/{id}`: Update an existing movie.
- `PUT /admin/users/{id}`: Update an existing user.
- `DELETE /admin/movies/{id}`: Delete a movie.
- `DELETE /admin/users/{id}`: Delete a user.

## Testing

To run tests, use the following command:

```bash
php artisan test
```

## Contributing

Feel free to fork this project, make changes, and submit a pull request if you want to contribute improvements.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
