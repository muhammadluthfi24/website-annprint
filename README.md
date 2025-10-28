<!-- PROJECT HEADER -->
  <h1>🧵 ANNPRINT – Fashion Printing Management System</h1>
  <p>
    A modern Laravel-based application for managing orders, designs, and production in fashion printing.  
    Built to simplify order tracking, customer management, and design printing for small to medium-scale fashion businesses.
  </p>

  <p align="center">
    <a href="https://github.com/muhammadluthfi24/website-annprint"><strong>View on GitHub »</strong></a>  
    <br><br>
    <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
    <img src="https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge&logo=php&logoColor=white">
    <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white">
  </p>
</div>

---

## 🚀 Installation Guide

Follow the steps below to set up **ANNPRINT** on your local machine:

1.**Clone the Repository**
```bash
git clone https://github.com/username/annprint.git
cd annprint

2. **Install XAMPP and Composer**  
   Ensure that Apache and MySQL are running properly.

3. **Extract the Project**  
   Use **WinRAR** or similar software to extract the `.zip` file.

4. **Move the Folder to htdocs**  
   Copy the folder `annprint` and paste it into:
   ```
   C:\xampp\htdocs\
   ```

5. **Start XAMPP Services**  
   Run **Apache** and **MySQL** in the XAMPP Control Panel.

6. **Create the Database**  
   Open:
   ```
   http://localhost/phpmyadmin
   ```
   Then create a new database named:
   ```
   annprint
   ```

7. **Import the Database File**
   Go to the **Import** tab in phpMyAdmin → choose:
   ```
   annprint.sql
   ```
   → Click **Go**.

8. **Serve the Laravel Application**
   Open the terminal in your project folder, then run:
   ```bash
   php artisan serve
   ```

9. **Access the App**
   Open your browser and go to:
   ```
   http://127.0.0.1:8000
   ```

10. **Default Admin Login**
   ```
   Email    : admin@admin.com
   Password : admin
   ```

---

## 🧩 Features

- 👕 Manage Fashion Printing Orders  
- 🎨 Display Design Catalogs  
- 👩‍💻 Admin & Customer Dashboard  
- 📊 Automatic Report Generation  
- 🔐 User Management (Admin & Customer)

---

## ⚙️ Technology Stack

| Component | Version / Tool |
|------------|----------------|
| Framework  | Laravel 10     |
| Language   | PHP 8+         |
| Database   | MySQL          |
| Frontend   | Bootstrap / Tailwind CSS |
| Server     | Apache (XAMPP) |

---

## 🧾 Environment Configuration

Make sure your `.env` file is set as follows:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=annprint
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🖼️ System Flow Diagram
Below is the main system workflow of ANNPRINT:
> (Image automatically loaded from `/public/images/Diagram alur.jpg`)

![System Flow Diagram](https://github.com/user-attachments/assets/4ccc9fe6-1981-43ff-8bb8-1d390fa4f2e0)

---

## 💡 Notes

- If the database connection fails, check your `.env` configuration.  
- Make sure Composer dependencies are installed:
  ```bash
  composer install
  ```
- Run migrations (optional, if needed):
  ```bash
  php artisan migrate
  ```
<p align="center">© 2025 ANNPRINT – Fashion Printing Management System</p>
