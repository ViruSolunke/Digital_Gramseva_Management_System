<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// 1. Database Connection
$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database Connection Failed"]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Generate Unique App ID
    $appID = "PMAY-2026-" . rand(10000, 99999);

    // 3. Collect Data (Mapping exactly with your HTML 'name' tags)
    $fullName = $_POST['FullName'] ?? '';
    $mobileNumber = $_POST['MobileNumber'] ?? '';
    $aadharNumber = $_POST['AadharNumber'] ?? '';
    $voterID = $_POST['VoterID'] ?? '';
    $dob = $_POST['DOB'] ?? '';
    $category = $_POST['Category'] ?? '';
    $religion = $_POST['Religion'] ?? '';
    $disability = $_POST['Disability'] ?? '';
    $bplCardNo = $_POST['BPLCardNo'] ?? '';
    $occupation = $_POST['Occupation'] ?? '';
    $annualIncome = $_POST['AnnualIncome'] ?? 0;
    $bankAccountNo = $_POST['BankAccountNo'] ?? '';
    $bankIFSC = $_POST['BankIFSC'] ?? '';
    $wardNumber = $_POST['WardNumber'] ?? 0;
    $houseType = $_POST['HouseType'] ?? '';
    $roomCount = $_POST['RoomCount'] ?? 0;

    // 4. Prepare SQL
    $sql = "INSERT INTO pmay_applications (app_id, full_name, mobile_number, aadhar_number, voter_id, dob, category, religion, disability, bpl_card_no, occupation, annual_income, bank_account_no, bank_ifsc, ward_number, house_type, room_count) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    // "sssssssssssdssisi" - represents types (s=string, i=int, d=decimal)
    $stmt->bind_param("sssssssssssdssisi", $appID, $fullName, $mobileNumber, $aadharNumber, $voterID, $dob, $category, $religion, $disability, $bplCardNo, $occupation, $annualIncome, $bankAccountNo, $bankIFSC, $wardNumber, $houseType, $roomCount);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "appID" => $appID]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>