<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gram_panchayat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed"]));
}

// Data Receive karna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket = $_POST['ticket_id'];
    $name = $_POST['ComName'];
    $mobile = $_POST['MobileNumber'];
    $ward = $_POST['ward'];
    $pole = $_POST['poleNumber'];
    $fault = $_POST['Fault'];
    $level = $_POST['EmergencyLevel'];
    $landmark = $_POST['Location'];
    $desc = $_POST['IssueDescription'];

    // SQL Query
    $sql = "INSERT INTO light_complaints (ticket_id, complainant_name, mobile_number, ward, pole_number, fault_category, emergency_level, landmark, description) 
            VALUES ('$ticket', '$name', '$mobile', '$ward', '$pole', '$fault', '$level', '$landmark', '$desc')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
$conn->close();
?>