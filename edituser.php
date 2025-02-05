<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'crud');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $zipcode = $_POST['zipcode'];
    $mobileno = $_POST['mobileno'];

    // Update data
    $sql = "UPDATE usermaster SET firstname='$firstname', lastname='$lastname', address='$address', email='$email', password='$password', gender='$gender', dob='$dob', age=$age, zipcode='$zipcode', mobileno='$mobileno' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User updated successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch user data
$id = $_GET['id'];
$sql = "SELECT * FROM usermaster WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label>First Name:</label>
            <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" required><br>

            <label>Last Name:</label>
            <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" required><br>

            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <label>Password:</label>
            <input type="password" name="password" value="<?php echo $row['password']; ?>" required><br>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="M" <?php echo ($row['gender'] == 'M') ? 'selected' : ''; ?>>Male</option>
                <option value="F" <?php echo ($row['gender'] == 'F') ? 'selected' : ''; ?>>Female</option>
            </select><br>

            <label>Date of Birth:</label>
            <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required><br>

            <label>Age:</label>
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required><br>

            <label>Zipcode:</label>
            <input type="text" name="zipcode" value="<?php echo $row['zipcode']; ?>" required><br>

            <label>Mobile No:</label>
            <input type="text" name="mobileno" value="<?php echo $row['mobileno']; ?>" required><br>

            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>