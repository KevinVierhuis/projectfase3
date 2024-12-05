<?php
header("Content-Type: application/json");
session_start();

if (isset($_SESSION['student_name'])) {
    echo json_encode(['loggedIn' => true, 'student_name' => $_SESSION['student_name']]);
} else {
    echo json_encode(['loggedIn' => false]);
}
?>