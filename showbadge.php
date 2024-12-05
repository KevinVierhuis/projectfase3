<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require('./dbconnect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['student_name'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

$student_name = $_SESSION['student_name'];

// Query badges for the logged-in user
$query = $conn->prepare("SELECT * FROM badge WHERE student_name = ?");
$query->bind_param("s", $student_name);
$query->execute();
$result = $query->get_result();

$badges = [];
while ($row = $result->fetch_assoc()) {
    $badges[] = [
        'id' => $row['id'],
        'path' => $row['path'],
        'description' => $row['description'],
        'date_achieved' => $row['date_achieved'],
    ];
}

// Return badges as JSON
echo json_encode(['success' => true, 'badges' => $badges]);
?>
