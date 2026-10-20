# Simple Educational PHP PDO Blog

A minimal, post-centric blog application built using **PHP** and **PDO (PHP Data Objects)**. This project is designed specifically for learning core CRUD (Create, Read, Update, Delete) operations with dedicated PHP scripts for each action and no authentication layer to keep concepts clear and focused.

Lazily generated with Gemini Auto Low ([https://share.gemini.google/cX1TRLr1VX9F](https://share.gemini.google/cX1TRLr1VX9F)).

---

## 🌟 Key Educational Features

* **Prepared Statements:** Uses PDO parameterized queries to prevent SQL Injection attacks.
* **XSS Prevention:** Utilizes `htmlspecialchars()` when rendering user input to prevent Cross-Site Scripting.
* **Separation of CRUD Logic:** Clear file structure separating every primary action into its own script.
* **Clean & Modern Connection:** Employs modern PDO error handling (`PDO::ERRMODE_EXCEPTION`) and default associative fetching.

---

## 📁 Project Structure

```text
simple-php-blog/
│
├── db.php        # Database connection using PDO
├── schema.sql    # Database structure & setup script
├── index.php     # [READ] List all blog posts
├── view.php      # [READ] Display a single post
├── create.php    # [CREATE] Add a new post
├── update.php    # [UPDATE] Edit an existing post
└── delete.php    # [DELETE] Remove a post
```

---

## 🚀 Installation & Setup

### Prerequisites

Ensure you have the following installed on your local machine:
* **PHP** (v7.4 or higher recommended)
* **MySQL** or **MariaDB** database engine
* A local development server environment (e.g., [XAMPP](https://www.apachefriends.org/), [WAMP](https://www.wampserver.com/en/), [Laragon](https://laragon.org/), or PHP's built-in web server)

---

### Step 1: Clone or Set Up Project Files

1. Create a folder inside your web server directory (e.g., `htdocs/simple-php-blog` for XAMPP).
2. Place all project files (`db.php`, `index.php`, `create.php`, `view.php`, `update.php`, `delete.php`) inside this directory.

---

### Step 2: Set Up the Database

1. Open your MySQL client (such as **phpMyAdmin** or MySQL CLI).
2. Create the database and table using the provided `schema.sql` queries:

```sql
CREATE DATABASE IF NOT EXISTS php_pdo_blog;
USE php_pdo_blog;

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### Step 3: Configure Database Credentials

Open `db.php` and update the connection settings to match your database user and password:

```php
$host = 'localhost';
$db   = 'php_pdo_blog';
$user = 'root'; // Change to your database username
$pass = '';     // Change to your database password
```

---

### Step 4: Run the Application

#### Option A: Using PHP's Built-in Web Server
1. Open your terminal or command prompt inside the project folder.
2. Run:
   ```bash
   php -S localhost:8000
   ```
3. Open your browser and navigate to `http://localhost:8000`.

#### Option B: Using XAMPP/WAMP/Laragon
1. Start Apache and MySQL in your server control panel.
2. Navigate to `http://localhost/simple-php-blog` in your web browser.

---

## 🛠️ Usage Guide

1. **View Posts:** Visit `index.php` to list all blog posts ordered by creation date.
2. **Create Post:** Click **"Create New Post"** (`create.php`), enter a title and content, and click **"Publish Post"**.
3. **Read Single Post:** Click **"Read More"** (`view.php?id=X`) to read the full body of a specific post.
4. **Edit Post:** Click **"Edit"** (`update.php?id=X`) next to any post to modify its content.
5. **Delete Post:** Click **"Delete"** (`delete.php?id=X`) and confirm the browser popup to safely remove the post.