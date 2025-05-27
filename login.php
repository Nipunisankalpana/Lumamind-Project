<?php
require 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();
  if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    header("Location: dashboard.html"); // You can create this page next
    exit();
  }
}
echo "<script>alert('Invalid credentials'); window.location.href = 'login.html';</script>";
?>
