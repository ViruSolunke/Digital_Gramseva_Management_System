<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database Connection Failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appId = "SCH-GOV-" . rand(100000, 999999);
    
    // Folder setup
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) { mkdir($uploadDir, 0777, true); }

    // Function to handle file upload safely
    function uploadFile($fileKey, $dir, $appId) {
        if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] != 0) return null;
        
        $extension = pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION);
        $fileName = $appId . "_" . $fileKey . "." . $extension;
        $targetPath = $dir . $fileName;

        if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $targetPath)) {
            return $targetPath;
        }
        return null;
    }

    // Uploading each document
    $photoPath = uploadFile('photo', $uploadDir, $appId);
    $signPath = uploadFile('signature', $uploadDir, $appId);
    $bonafidePath = uploadFile('bonafide', $uploadDir, $appId);
    $castePath = uploadFile('casteCert', $uploadDir, $appId);
    $incomePath = uploadFile('incomeCert', $uploadDir, $appId);

    $sql = "INSERT INTO scholarship_applications (app_id, full_name, email, phone, aadhar, category, income, course, college, university, prev_class, roll_number, passing_year, marks, photo_path, sign_path, bonafide_path, caste_path, income_path) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssdsssssissssss", 
        $appId, $_POST['fullName'], $_POST['email'], $_POST['phone'], $_POST['aadhar'], 
        $_POST['category'], $_POST['income'], $_POST['course'], $_POST['college'], 
        $_POST['university'], $_POST['previousClass'], $_POST['rollNumber'], 
        $_POST['passingYear'], $_POST['marks'], 
        $photoPath, $signPath, $bonafidePath, $castePath, $incomePath
    );

    if ($stmt->execute()) {
        echo json_encode([
            "status" => "success", 
            "app_id" => $appId,
            "name" => $_POST['fullName'],
            "course" => $_POST['course']
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    $stmt->close();
}
$conn->close();
?>