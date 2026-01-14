# Role-Based Project Management System

## 📌 Project Description
This is a Role-Based Project Management System built using **Laravel**.  
The system supports two roles: **Admin** and **User**, where each role has specific permissions.  
Admins can manage users and assign tasks, while Users can view and manage only the tasks assigned to them.

The project follows secure authentication practices, clean MVC architecture, and role-based access control.

---

## 🛠️ Technology Stack
- **Backend:** Laravel (PHP)
- **Database:** MySQL
- **Frontend:** HTML, CSS, Bootstrap
- **Authentication:** Laravel Auth (Custom)
- **Email:** SMTP (Mail Notifications)
- **Version Control:** Git & GitHub
- **Hosting:** Shared Hosting / VPS (Production Ready)

---

## ✨ Features

### 🔐 Authentication System
- User login & logout
- Secure password hashing
- Role-based access (Admin / User)
- Session-based authentication
- Protected routes using middleware

---

### 👨‍💼 Admin Module
- Admin dashboard
- Create, view, update, and delete users
- Assign tasks to users
- Task details include:
  - Title
  - Description
  - Deadline
  - Status (Pending / Completed)
- Update task status
- **Email notification sent when a new user is created**

---

### 👤 User Module
- User dashboard
- View only assigned tasks
- Mark own tasks as completed
- Restricted from accessing admin routes

---

## 📧 Additional Feature (Bonus)
- When an **Admin creates a new user**, an **email notification is sent via SMTP** to the user’s registered email address containing login details.
- SMTP credentials are managed securely using environment variables.

---

## 🧾 Form Handling & Validation
- Server-side validation using Laravel validation rules
- Secure handling of form inputs
- Flash messages for success and error responses

---

## 🔒 Role-Based Access Control
- Admin routes protected using `role:admin` middleware
- User routes protected using `role:user` middleware
- Unauthorized access is prevented

---

## 🗂️ Database & Seeder Setup
- Database structure is managed using **Laravel migrations**
- Seeders are provided for demo accounts

Run the following command to set up the database:
```bash
php artisan migrate --seed
