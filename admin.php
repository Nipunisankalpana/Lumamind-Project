<?php
session_start();

// Example of checking if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login page
    exit;
}

// Later: Fetch real data from database
$users = 134;
$therapists = 8;
$coaches = 15;

$data = array(
  'users' => $users,
  'therapists' => $therapists,
  'coaches' => $coaches
);

header('Content-Type: application/json');
echo json_encode($data);
?>
