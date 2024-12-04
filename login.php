<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "rbac_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // For demonstration purposes

    // Query the user and role
    $stmt = $conn->prepare("SELECT users.id, users.password, roles.role_name 
                            FROM users JOIN roles ON users.role_id = roles.id 
                            WHERE users.username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['password'] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role_name'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid username or password.";
    }
    $stmt->close();
}
$conn->close();
?>
