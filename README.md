# Laboratory Assignment - Laravel Application

A comprehensive Laravel application demonstrating authentication, database management, and a custom monochrome UI.

## 🚀 Setup Instructions

Follow these steps to set up the project locally:

1.  **Clone the repository** (if you haven't already).
2.  **Install PHP Dependencies**:
    ```bash
    composer install
    ```
3.  **Install Frontend Dependencies**:
    ```bash
    npm install && npm run build
    ```
4.  **Environment Configuration**:
    - Copy the example environment file:
      ```bash
      cp .env.example .env
      ```
    - Update the `.env` file with your database credentials (e.g., `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
5.  **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```
6.  **Run Migrations and Seeders**:
    - This will create the database tables and populate them with sample data.
    ```bash
    php artisan migrate --seed
    ```
7.  **Serve the Application**:
    ```bash
    php artisan serve
    ```
    - Access the app at `http://127.0.0.1:8000`.

## 🔐 Login Credentials

The database is seeded with a specific test user and 100 random users.

### **Primary Test User**
Use this account for immediate access and testing.
- **Email**: `test@example.com`
- **Password**: `password`

### **Seeded Users**
- **Count**: 100 randomly generated users.
- **Password**: `password` (All seeded users share this default password).
- **Emails**: Check your database (`users` table) for other generated email addresses if needed.

## 🎨 Features
- **Monochrome UI**: A strict black-and-white theme for a modern, clean validation interface.
- **Custom Dashboard**: Real-time stats, user activity logs, and profile management.
- **Secure Authentication**: Powered by Laravel Breeze with additional username and active-status checks.
