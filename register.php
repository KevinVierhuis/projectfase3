<?php
header("Content-Type: application/json");
require('./dbconnect.php');

$data = json_decode(file_get_contents('php://input'), true);
$student_name = $data['student_name'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_BCRYPT);

$query = $conn->prepare("INSERT INTO users (student_name, email, password) VALUES (?, ?, ?)");
$query->bind_param("sss", $student_name, $email, $password);

if ($query->execute()) {
    echo json_encode(['success' => true, 'message' => 'Registratie succesvol.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Registratie mislukt.']);
}
?>
