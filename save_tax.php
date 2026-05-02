<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database Connection Failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ack ID generate karna
    $ackID = "TAX-" . rand(10000, 99999);

    $p_name = $_POST['p_name'];
    $p_father = $_POST['p_father'];
    $p_aadhaar = $_POST['p_aadhaar'];
    $p_mobile = $_POST['p_mobile'];
    $p_type = $_POST['p_type'];
    $p_area = $_POST['p_area'];
    $p_built = $_POST['p_built'];
    $p_year = $_POST['p_year'];
    $p_address = $_POST['p_address'];

    $stmt = $conn->prepare("INSERT INTO property_tax (ack_number, owner_name, guardian_name, aadhaar_number, mobile_number, property_type, total_area, built_area, construction_year, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssssiiis", $ackID, $p_name, $p_father, $p_aadhaar, $p_mobile, $p_type, $p_area, $p_built, $p_year, $p_address);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "ackID" => $ackID]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    $stmt->close();
}
$conn->close();
?>