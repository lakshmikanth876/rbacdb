<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}

echo "<h1>Welcome, " . $_SESSION['username'] . "</h1>";
echo "<p>Your role is: " . $_SESSION['role'] . "</p>";

// Role-based content
if ($_SESSION['role'] == 'Admin') {
    echo "<p>Admin Access: Manage users, roles, and permissions.</p>";
} elseif ($_SESSION['role'] == 'Editor') {
    echo "<p>Editor Access: Create and edit content.</p>";
} elseif ($_SESSION['role'] == 'Viewer') {
    echo "<p>Viewer Access: View content only.</p>";
}

echo '<a href="logout.php">Logout</a>';
?>
