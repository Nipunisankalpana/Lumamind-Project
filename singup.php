<?php
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
  echo "<script>alert('Signup successful!'); window.location.href = 'login.html';</script>";
} else {
  echo "Error: " . $conn->error;
}
?>
