<?php
header('Content-Type: application/json');

// Database Connection
$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection Failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_card = $_POST['job_card'];
    $worker_name = $_POST['worker_name'];
    $worker_aadhaar = $_POST['worker_aadhaar'];
    $start_date = $_POST['start_date'];
    $days_count = $_POST['days_count'];
    $ref_id = $_POST['ref_id']; // JS se generate hokar aayega
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO mgnrega_requests (job_card, worker_name, worker_aadhaar, start_date, days_count, ref_id, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $job_card, $worker_name, $worker_aadhaar, $start_date, $days_count, $ref_id, $status);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    
    $stmt->close();
}
$conn->close();
?>