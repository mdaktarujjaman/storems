# 🏪 Store Management System

A web-based store management system built with raw PHP and Bootstrap.
Manages products, sales, inventory and generates
reports for small businesses and retail stores.

---

## ✨ Features

- 🛍️ Product management (Add, Edit, Delete)
- 📦 Inventory tracking & stock management
- 💰 Sales recording & history
- 📊 Report generation
- 👤 User authentication & role management
- 📱 Responsive design with Bootstrap

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP (Raw / Vanilla) |
| Frontend | HTML5, CSS3, Bootstrap |
| Database | MySQL |
| Server | Apache (XAMPP/LAMP) |

---

## 🚀 Getting Started

### Prerequisites
- XAMPP / LAMP / WAMP installed
- PHP 7.4+
- MySQL

### Installation

```bash
# Clone the repository
git clone https://github.com/mdaktarujjaman/storems.git
```

1. Copy project folder to `htdocs` (XAMPP) or `www` (WAMP)
2. Open **phpMyAdmin**
3. Create a new database: `storems`
4. Import `storems.sql` file from the project
5. Update `config.php` with your DB credentials:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'storems');
```


---

## 📌 Core Modules

| Module | Description |
|--------|-------------|
| Dashboard | Sales overview & quick stats |
| Products | Add, edit & manage products |
| Inventory | Track stock levels |
| Sales | Record & view transactions |
| Reports | Generate sales & stock reports |
| Users | Manage staff accounts |

---

## 📁 Project Structure
