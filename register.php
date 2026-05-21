<?php
$conn = new mysqli("localhost", "root", "", "seekers_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['useremail'];
$password = password_hash($_POST['userpassword'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (user_name,email, password) VALUES ('$username','$email', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: sign-in.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
