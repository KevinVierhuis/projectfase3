<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require('./dbconnect.php');

ini_set('display_errors', 0); // Suppress unexpected output
error_reporting(E_ALL);      // Enable logging of all errors

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'No input received.']);
    exit;
}

$student_name = $data['student_name'];
$password = $data['password'];

session_start();

$query = $conn->prepare("SELECT * FROM users WHERE student_name = ?");
$query->bind_param("s", $student_name);
$query->execute();
$result = $query->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['student_name'] = $user['student_name'];
        echo json_encode(['success' => true, 'message' => 'Login succesvol.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ongeldige inloggegevens.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Gebruiker niet gevonden.']);
}
exit; // Ensure no further processing
