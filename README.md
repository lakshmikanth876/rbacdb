**Role-Based Access Control (RBAC) System**
This project is a simple implementation of Role-Based Access Control (RBAC) using HTML, CSS, PHP, and MySQL. It demonstrates the concepts of authentication, authorization, and user role management by allowing multiple users to log in and access different parts of the system based on their assigned roles.
**Authentication**
Authentication is about verifying who you are. It ensures that the person or system trying to access something is genuinely who they claim to be.
**Authorization**
Authorization is about determining what you are allowed to do after your identity is verified. It controls access to resources, features, or actions based on your permissions or role.
**Step by step implementation of rbac system**
fo implementation we need xampp 
open xampp and turn on Apache and MySql
then open chrome and open phpmyadmin at http://localhost/phpmyadmin/
create a database (create database rbac_system;)
create tables (
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);
) created two tables named roles and users .
insert data into the tables (
INSERT INTO roles (role_name) VALUES ('Admin'), ('Editor'), ('Viewer');

INSERT INTO users (username, password, role_id) VALUES
('admin_user', MD5('admin_password'), 1),
('editor_user1', MD5('editor_password'), 2),
('editor_user2', MD5('editor_password'), 2),
('viewer_user', MD5('viewer_password'), 3);
)
then go to c/htdocs and create a folder named rbac_project
inside rbac_project 
index.html
login.php
logout.php
dashboard.php
now we can access our application by going to the link "http://localhost/rbac_project/index.html"
![Screenshot 2024-12-04 111718](https://github.com/user-attachments/assets/9be068be-2006-4673-a3e5-302c21fca875)
type your login credentials 
![Screenshot 2024-12-04 112235](https://github.com/user-attachments/assets/6ffffe68-ea4d-43aa-b23f-5aa86d8e187d)
