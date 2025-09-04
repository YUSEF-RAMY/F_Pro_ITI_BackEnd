# 📚 Book Management System

This project is a **Book Management System** built with **Laravel**, allowing students to borrow and return books while providing an admin dashboard to manage the whole process.

---

## 🚀 Features
- User authentication (Students + Admin).
- Upload profile picture for users.
- Book management (add, edit, delete).
- Borrowing books with automatic quantity decrement.
- Returning books with status update.
- Admin dashboard to track all borrow/return records.
- Filtering:
  - Students can only see their currently borrowed books.
  - Admin can see all borrow and return records.

- Admin Module Features
 - Admin Dashboard
  - Admin can see (Borrowed books - All Books - All User )
  - Admin can add/update/ delete books
  - Admin can search student by using their student ID
  - Admin can also view student details
  - Admin can update their own profile.
  - Authorization is applied so only the admin can perform these tasks.

- Students Module features
 - Student Dashboard
  - Students can register to the website.
  - Students can view all the books and their details.
  - Students can borrow a book.
  - After login students can view their own dashboard 
   - (they can see the books they borrowed before   and   - they can return it back to the shelf)
  - Students can update their own profile.
  - Students can view the borrowed book and book return date-time

--

---

## 🛠️ Tech Stack
- **Laravel 12**
- **Blade Templates**
- **MySQL Database**
- **TailwindCSS**
- **Bootstrap**
- **Flowbite**
- **Laravel Breeze** (for authentication)

---

## 👨‍💻 Team
This project was developed as the **final project at ITI training** by the team:

- Eng: **Yusef Ramy Saber**  
- Eng: **Ali Alaa Ramadan**

---

## ⚡ Installation & Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/YUSEF-RAMY/F_Pro_ITI_BackEnd.git
   cd project-folder
   ```

2. Install Dependencies
    ```bash
    composer install
    npm install
    npm run dev
    composer require laravel/breeze --dev
    php artisan breeze:install
    php artisan breeze:install blade
    ```

3. Setup Environment File
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Create The Database , Migrations And Admin Account
    ```bash
    php artisan migrate --seed
    ```

5. Create The Storage Link For Images
    ```bash
    php artisan storage:link
    ```

6. Start The Server
    ```bash
    composer run dev
    ```

---

## 💡 Final Note
This project was developed with passion and teamwork as part of our ITI final training project.  
We hope this system helps in simplifying the process of managing libraries and inspires others to build more educational solutions.  

Thank you for checking out our work! 🙌  



