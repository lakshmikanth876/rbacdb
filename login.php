<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         if ($password === $row['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header('Location: dashboard.html');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No such user found.";
    }
}
?>
