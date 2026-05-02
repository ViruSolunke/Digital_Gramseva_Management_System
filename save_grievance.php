<?php
header('Content-Type: application/json');

// 1. Database Connection
$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed"]);
    exit;
}

// 2. Data Collect karna (HTML Input IDs ke matching)
$trackingID = "GRV-" . rand(10000, 99999);
$fullName = $_POST['fullName'] ?? '';
$mobileNumber = $_POST['mobileNumber'] ?? '';
$department = $_POST['department'] ?? '';
$subject = $_POST['subject'] ?? '';
$description = $_POST['description'] ?? '';

// 3. SQL Query
$sql = "INSERT INTO complaints (trackingID, fullName, mobileNumber, department, subject, description) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $trackingID, $fullName, $mobileNumber, $department, $subject, $description);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success", 
        "trackingID" => $trackingID,
        "name" => $fullName,
        "dept" => $department
    ]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$stmt->close();
$conn->close();
?>