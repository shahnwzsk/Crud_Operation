<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'crud');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
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

    // Insert data
    $sql = "INSERT INTO usermaster (firstname, lastname, address, email, password, gender, dob, age, zipcode, mobileno)
            VALUES ('$firstname', '$lastname', '$address', '$email', '$password', '$gender', '$dob', $age, '$zipcode', '$mobileno')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User added successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add User</h1>
        <form method="POST">
            <label>First Name:</label>
            <input type="text" name="firstname" required><br>

            <label>Last Name:</label>
            <input type="text" name="lastname" required><br>

            <label>Address:</label>
            <input type="text" name="address" required><br>

            <label>Email:</label>
            <input type="email" name="email" required><br>

            <label>Password:</label>
            <input type="password" name="password" required><br>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>

            <label>Date of Birth:</label>
            <input type="date" name="dob" required><br>

            <label>Age:</label>
            <input type="number" name="age" required><br>

            <label>Zipcode:</label>
            <input type="text" name="zipcode" required><br>

            <label>Mobile No:</label>
            <input type="text" name="mobileno" required><br>

            <button type="submit">Add User</button>
        </form>
    </div>
</body>
</html>