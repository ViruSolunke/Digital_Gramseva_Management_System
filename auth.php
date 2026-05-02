<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "gram_panchayat"); // Check your DB name

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Server Error"]);
    exit;
}

$action = $_GET['action'] ?? '';

if ($action == 'register') {
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $pass = $_POST['password']; // Original validation logic follows

    $check = $conn->query("SELECT id FROM gov_users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo json_encode(["status" => "exists"]);
    } else {
        $sql = "INSERT INTO gov_users (fullName, email, password) VALUES ('$name', '$email', '$pass')";
        if ($conn->query($sql)) echo json_encode(["status" => "success"]);
    }
}

if ($action == 'login') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = $conn->query("SELECT fullName FROM gov_users WHERE email='$email' AND password='$pass'");
    if ($user = $result->fetch_assoc()) {
        echo json_encode(["status" => "success", "name" => $user['fullName']]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
$conn->close();
?>