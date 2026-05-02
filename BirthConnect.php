<?php
require_once "auth.php";
?>

<?php
// Error reporting on karein debugging ke liye
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gram_panchayat";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Connection Failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Form se data lena (Checking if keys exist)
        $childName = $_POST['childName'] ?? '';
        $dob = $_POST['dob'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $pob = $_POST['pob'] ?? '';
        $fatherName = $_POST['fatherName'] ?? '';
        $motherName = $_POST['motherName'] ?? '';
        $fatherAadhaar = $_POST['fatherAadhaar'] ?? '';
        $mobile = $_POST['mobile'] ?? '';

        // Prepared Statement
        $stmt = $conn->prepare("INSERT INTO birth_registrations (childName, dob, gender, pob, fatherName, motherName, fatherAadhaar, mobile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            throw new Exception("Prepare Failed: " . $conn->error);
        }

        $stmt->bind_param("ssssssss", $childName, $dob, $gender, $pob, $fatherName, $motherName, $fatherAadhaar, $mobile);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            throw new Exception("Execute Failed: " . $stmt->error);
        }

        $stmt->close();
    }
    $conn->close();

} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>