<?php
// Error reporting on karein taaki humein error dikhe
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// 1. Connection
$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// 2. Data lena (Form names se match hona chahiye)
$trackingID = "GP" . rand(100000, 999999);
$fullName = $_POST['fullName'] ?? '';
$mobileNumber = $_POST['mobileNumber'] ?? '';
$wardNumber = $_POST['wardNumber'] ?? '';
$essueType = $_POST['essueType'] ?? '';
$Description = $_POST['Description'] ?? '';

// 3. File Upload handling
$proofPath = "No file";
if (!empty($_FILES['proofUpload']['name'])) {
    $targetDir = "uploads/";
    
    // Agar folder nahi hai toh banayein
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $fileName = time() . "_" . basename($_FILES["proofUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    
    if (move_uploaded_file($_FILES["proofUpload"]["tmp_name"], $targetFilePath)) {
        $proofPath = $targetFilePath;
    }
}

// 4. SQL Query (Prepared Statement)
$stmt = $conn->prepare("INSERT INTO complaints (trackingID, fullName, mobileNumber, wardNumber, essueType, Description, proofPath) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $trackingID, $fullName, $mobileNumber, $wardNumber, $essueType, $Description, $proofPath);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "trackingID" => $trackingID]);
} else {
    echo json_encode(["status" => "error", "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>