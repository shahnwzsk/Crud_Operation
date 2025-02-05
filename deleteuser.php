<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'crud');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete user
$id = $_GET['id'];
$sql = "DELETE FROM usermaster WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User deleted successfully'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>