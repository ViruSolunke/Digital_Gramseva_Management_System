<?php
header('Content-Type: application/json');

// DB Config
$servername = "localhost";
$username = "root";  // apna DB username
$password = "";      // apna DB password
$dbname = "gram_panchayat";

// DB Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

// Get action
$action = $_GET['action'] ?? '';

if ($action === 'register') {
    $name = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';
    
    $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_pass);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email already registered']);
    }
    $stmt->close();

} elseif ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT full_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($full_name, $hashed_pass);
        $stmt->fetch();
        if (password_verify($pass, $hashed_pass)) {
            echo json_encode(['status' => 'success', 'name' => $full_name]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }
    $stmt->close();
}

$conn->close();
?>