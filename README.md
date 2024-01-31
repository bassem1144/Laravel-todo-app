# Laravel To-do app

## Requirements

Before you begin, ensure you have met the following requirements:

- [PHP](https://www.php.net/) installed
- [Composer](https://getcomposer.org/) installed
- [Node.js](https://nodejs.org/) installed (optional, for frontend assets)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/bassem1144/Laravel-todo-app.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd todo-app
    ```

3. **Install PHP dependencies:**

    ```bash
    composer install
    ```

4. **Copy the `.env.example` file to `.env` and update the configuration:**

    ```bash
    cp .env.example .env
    ```

    Update the database and other configuration settings in the `.env` file.

5. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

6. **Install frontend dependencies:**

    ```bash
    npm install && npm run dev
    ```

## Database Setup

1. **Run database migrations:**

    ```bash
    php artisan migrate
    ```

2. **Seed the database:**

    ```bash
    php artisan db:seed
    ```

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

Access the application in your web browser at http://127.0.0.1:8000
