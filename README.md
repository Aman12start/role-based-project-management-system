# Role-Based Project Management System (Laravel)

A backend-driven project management system built using Laravel, implementing role-based access control (RBAC) with secure authentication and task management workflows.

---

## 🚀 Features

- Role-based access control (Admin / User)
- Secure authentication and session management
- Task assignment and tracking system
- Email notification system for user onboarding
- Protected routes using middleware
- Server-side validation and secure data handling

---

## 🧠 System Design Overview

- **Admin Role:**
  - Manage users (create, update, delete)
  - Assign tasks with deadlines and status
  - Monitor task progress

- **User Role:**
  - Access only assigned tasks
  - Update task status
  - Restricted access to admin functionality

- **Access Control:**
  - Middleware-based route protection (`role:admin`, `role:user`)
  - Unauthorized access handling

---

## 🛠 Tech Stack

- Laravel (PHP Framework)
- MySQL (Database)
- RESTful APIs
- JavaScript (basic interaction)
- SMTP (Email notifications)
- Git & GitHub

---

## ⚙️ Backend Highlights

- Designed modular backend structure using Laravel MVC
- Implemented role-based middleware for access control
- Built APIs for task assignment and status updates
- Integrated email service for user onboarding
- Ensured data validation and secure request handling

---

## ⚙️ Setup Instructions

```bash
git clone <repo-url>
cd project-folder
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
