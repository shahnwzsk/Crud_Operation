<?php
// Database connection
$conn = new mysqli('localhost', 'root', '','crud');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT id, firstname, lastname, email, dob FROM usermaster";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>User List</h1>
        <a href="adduser.php" class="add-user">Add User</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['firstname']} {$row['lastname']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['dob']}</td>
                                <td>
                                    <a href='edituser.php?id={$row['id']}'>Edit</a> |
                                    <a href='#' onclick='confirmDelete({$row['id']})'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(userId) {
            if (confirm("Do you want to delete the user?")) {
                window.location.href = `deleteuser.php?id=${userId}`;
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>