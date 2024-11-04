# Contact Management System

A full-stack web application for managing contacts built with PHP, MySQL, HTML, and CSS.

## Features

- **User Authentication**
  - User registration with profile picture upload
  - User login/logout functionality
  - Admin login/logout functionality
  - Password recovery system

- **Contact Management**
  - Add new contacts
  - Edit existing contacts
  - Delete contacts
  - Search contacts
  - View contact list

- **User Management (Admin)**
  - Add new users
  - Edit user details
  - Delete users
  - View all users

- **Activity Logging**
  - Track user actions
  - View activity logs
  - Delete logs

## Technologies Used

- **Frontend**
  - HTML5
  - CSS3
  - SweetAlert2 for notifications

- **Backend**
  - PHP
  - MySQL

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/contact-management-system.git
```

2. Import the database:
   - Create a new database named `contact_management_system`
   - Import the SQL file from 

contact_management_system.sql



3. Configure database connection:
   - Open 

server.php


   - Update database credentials if needed:
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_management_system";
```

4. Place the project in your web server directory (e.g., `htdocs` for XAMPP)

## Usage

1. Start your web server and MySQL service
2. Access the application through your web browser
3. Register as a new user or login with existing credentials
4. Admin credentials:
   - Email: admin@gmail.com
   - Password: admin

## Directory Structure

```
├── CSS/                    # Stylesheet files
├── Database/              # Database SQL file
├── Uploads/               # User profile pictures
├── admin_dashboard.php    # Admin dashboard
├── admin_login.php       # Admin login
├── contact.php           # Contact management
├── dashboard.php         # User dashboard
├── login.php            # User login
├── register.php         # User registration
├── server.php           # Database connection
└── user_management.php  # User management
```

## Security Features

- Password hashing
- SQL injection prevention
- Session management
- Input validation
- File upload validation
