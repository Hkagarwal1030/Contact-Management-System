# Contact-Management-System
📇 PHP Contact Management System














A simple yet powerful Contact Management System built using PHP, MySQL, and HTML/CSS.
This app allows users to add, view, edit, and delete contacts with a clean interface and organized structure.

✨ Features
✔ Add New Contacts

Name

Phone Number

Email Address

✔ View All Contacts

Displays all saved contacts in a table

Auto-updates after every action

✔ Edit Contacts

Update name, number, or email

Clean and simple edit UI

✔ Delete Contacts

Remove any contact instantly

✔ MySQL Database Integration

Uses separate db.php connection file

Structured CRUD operations

✔ Clean UI

Styled using your uploaded style.css file (background from CSS included)


style

📂 Project Structure
/contact-management
│── index.php             → List all contacts
│── add_contact.php       → Add new contact
│── edit_contact.php      → Edit contact
│── delete_contact.php    → Delete contact
│── db.php                → Database connection file
│── style.css             → Styling
│── README.md

🗄️ Database Setup

Create the database and table in phpMyAdmin or MySQL CLI:

CREATE DATABASE contact_db;

USE contact_db;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL
);

⚙️ Configure Database Connection

Edit db.php:

$conn = new mysqli("localhost", "root", "", "contact_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

🚀 How to Run the Project
1️⃣ Move folder to your local server

For XAMPP:

htdocs/contact-management/

2️⃣ Start Apache & MySQL

Open XAMPP → Start both services.

3️⃣ Visit the project in your browser
http://localhost/contact-management/

4️⃣ Use the interface

Add contacts using the form

Manage them from the table

Edit or delete anytime

🔒 Security Notes

Inputs can be sanitized for extra security

SQL queries should be upgraded to prepared statements

Email validation recommended for production

📌 Future Enhancements

Search bar for contacts

Pagination for large contact lists

Export to CSV

Image/avatar upload

Bootstrap UI upgrade

API version for mobile apps

🤝 Contributing

Want to improve this project?

Fork the repo

Create a new feature branch

Commit changes

Open a pull request

📄 License

This project is licensed under the MIT License.
