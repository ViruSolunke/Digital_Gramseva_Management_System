<?php
header('Content-Type: application/json');

// Database Connection
$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection Failed: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Application ID generate karna
    $appID = "WAT-" . rand(10000, 99999);

    // Form data fetch karna (Name attributes se match hona chahiye)
    $fullName = $_POST['fullName'] ?? '';
    $guardianName = $_POST['guardianName'] ?? '';
    $AadharNumber = $_POST['AadharNumber'] ?? '';
    $mobileNumber = $_POST['mobileNumber'] ?? '';
    $emailAddress = $_POST['emailAddress'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $propertyID = $_POST['propertyID'] ?? '';
    $wardNumber = $_POST['wardNumber'] ?? '';
    $familyMembers = $_POST['familyMembers'] ?? 0;
    $taxDues = $_POST['taxDues'] ?? '';
    $pipeSize = $_POST['pipeSize'] ?? '';
    $connectionCategory = $_POST['connectionCategory'] ?? '';
    $plumberLicense = $_POST['plumberLicense'] ?? '';

    // SQL Query
    $stmt = $conn->prepare("INSERT INTO water_connections (application_id, full_name, guardian_name, aadhar_number, mobile_number, email_address, gender, property_id, ward_number, family_members, tax_dues, pipe_size, connection_category, plumber_license) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssssssissss", $appID, $fullName, $guardianName, $AadharNumber, $mobileNumber, $emailAddress, $gender, $propertyID, $wardNumber, $familyMembers, $taxDues, $pipeSize, $connectionCategory, $plumberLicense);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "appID" => $appID]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>