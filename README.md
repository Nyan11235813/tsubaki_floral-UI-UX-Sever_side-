TSUBAKI FLORAL - Simple PHP E-commerce Site
This is a basic web application for TSUBAKI FLORAL, a flower shop, allowing users to browse products, learn about the company, and contact them. It also includes a simple admin panel for managing product listings.

🚀 Features
Homepage: Displays an overview of TSUBAKI FLORAL and possibly featured arrangements.
Shop Page: Browse a collection of floral arrangements.
About Us Page: Learn more about TSUBAKI FLORAL.
Contact Page: Send inquiries or feedback through a contact form.
Admin Panel: (For administrators only)
Add new products to the shop.
Edit existing product details.
Delete products from the shop.
Database Integration: Products and potentially contact messages are managed via a MySQL database.
User Authentication: Simple login/logout for the admin panel.

#

🧑‍💻 Technologies Used
PHP: Server-side scripting language for dynamic content and database interaction.
MySQL: Relational database management system for storing product information.
HTML: Structure of the web pages.
CSS (via assets/style.css): Custom styling for the website.
Bootstrap 5.3.2: Frontend framework for responsive and modern design.
Bootstrap Icons 1.11.1: For various icons used throughout the site.
Google Fonts (Playfair Display, Inter): For enhanced typography.

#

📌 Setup Instructions
To get this project up and running on your local machine, follow these steps:

Web Server: Ensure you have a web server environment like XAMPP, WAMP, or MAMP installed, which includes Apache and MySQL.
Database Configuration:
Access your MySQL database (e.g., via phpMyAdmin).

Create a new database named tsubaki_floral.

Import the following SQL structure to create the products table (you might need to create this manually or from a .sql file if provided):

SQL

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT '0.0',
  `reviews_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
The db_connect.php file is configured to connect to localhost with root username and an empty password. If your database credentials are different, you will need to update db_connect.php:

        <?php
$servername = "localhost"; // Your database server name
$username = "root";       // Your database username
$password = "";           // Your database password
$dbname = "tsubaki_floral"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```
Place Files: Copy all project files (about.html, admin.php, contact.php, db_connect.php, index.php, login.php, logout.php, shop.php, assets/, images/ etc.) into your web server's document root (e.g., htdocs for XAMPP).
Access the Site: Open your web browser and navigate to http://localhost/your_project_folder_name/index.php.

#

🧠Usage
Browse the Shop: Navigate through the "Home" and "Shop" pages to see floral arrangements.
Contact Us: Use the "Contact" form to send a message. (Note: The email sending or database saving functionality for contact messages is currently commented out or in demonstration mode in contact.php).

📄 Admin Access:
Go to http://localhost/your_project_folder_name/login.php to access the admin login page.
Use the following credentials to log in:
Username: admin
Password: password123
After logging in, you will be redirected to the admin.php page, where you can manage products.
To log out from the admin panel, click the "Logout" link.

Feel free to explore and modify the code to enhance its features!
