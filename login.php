<?php
session_start();
$conn = new mysqli("localhost", "root", "", "seekers_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['userpassword'];

$sql = "SELECT * FROM users WHERE user_name='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

$conn->close();
?>
