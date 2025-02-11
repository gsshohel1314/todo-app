# To-Do App

This is a simple To-Do app built using **PHP**, **Laravel** and **Tailwind CSS**. It allows users to create, update, and delete tasks. Additionally, the app sends email reminders for due tasks and supports CSV file attachments.

## Technologies Used

- **PHP**: ^8.2
- **Laravel**: ^11.31
- **Node.js**: 18.8.0
- **NPM**: 8.18.0
- **Tailwind CSS**: For styling the frontend
- **MySQL**: For the database

## Installation

### 1. Clone the repository
- git clone https://github.com/gsshohel1314/todo-app.git
- cd todo-app

### 2. Install Composer dependencies
- composer install

### 3. Install NPM dependencies
- npm install

### 4. Create a copy of your .env file
- cp .env.example .env

### 5. Generate an app encryption key
- php artisan key:generate

### 6. Add APP_URL
- http://127.0.0.1:8000

### 7. Set up the database
- Create a database and update the .env file with your database credentials.

### 8. Migrate the database
- php artisan migrate

### 9. [Optional]: Seed the database
- I seeded fake data for to-do model
- php artisan db:seed

### 10. Setup mailtrap credentials for showin mail

### 11. Run the Laravel development server
- php artisan serve

### 12. Running Frontend (for development)
- npm run dev

### 13. Keep running schedule worker for running command
- php artisan schedule:work

### 14. Run the Queue worker (for sending email reminders)
- php artisan queue:work

## Features
- CRUD Operations: Create, read, update, and delete To-Do tasks.
- Email Reminders: Send reminder emails for upcoming due tasks.
- CSV Attachment: Attach a CSV file with the email.
- User Authentication: Users can register and log in to manage their tasks.
