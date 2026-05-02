<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    $_SESSION['user_email'] = "user@example.com";
}

$user_email = $_SESSION['user_email'];

$conn = new mysqli("localhost", "root", "", "gram_panchayat");

if ($conn->connect_error) {
    die("Connection failed");
}

$scholarship_query = "SELECT app_id as id, course as info, status, created_at FROM scholarship_apps WHERE user_email='$user_email'";
$nrega_query = "SELECT ref_id as id, days_count as info, status, submitted_at FROM nrega_requests WHERE user_email='$user_email'";
$pmay_query = "SELECT application_no as id, house_type as info, status, created_at FROM pmay_apps WHERE user_email='$user_email'";

$scholarships = $conn->query($scholarship_query);
$nrega = $conn->query($nrega_query);
$pmay = $conn->query($pmay_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Applications | Gram Panchayat Chincholi</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

.gov-gradient{background:linear-gradient(90deg,#022a5e,#0b5ed7)}

.service-card:hover{
transform:translateY(-5px);
transition:.3s
}

.section-title{
border-left:6px solid #f97316;
padding-left:15px
}

</style>

</head>

<body class="bg-slate-50">

<!-- TOP GOV BAR -->

<div class="bg-gray-100 text-xs py-1 px-10 border-b flex justify-between text-gray-600">

<div>
Govt. of India | <span class="font-bold text-blue-800">Ministry of Panchayati Raj</span>
</div>

</div>

<!-- HEADER -->

<header class="bg-white py-4 px-10 flex justify-between items-center shadow-md">

<div class="flex items-center gap-4">

<img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Emblem_of_India.svg" class="h-16">

<div class="border-l-2 pl-4">

<h1 class="text-2xl font-black text-blue-900">ग्राम पंचायत चिंचोली</h1>

<h2 class="text-lg font-bold text-gray-700 uppercase">
Gram Panchayat Chincholi
</h2>

<p class="text-xs text-orange-600 font-bold">
District: Jalgaon | Maharashtra
</p>

</div>

</div>

<div class="flex gap-4">

<img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/95/Digital_India_logo.svg/1200px-Digital_India_logo.svg.png" class="h-12">

</div>

</header>

<!-- NAVBAR -->

<nav class="gov-gradient text-white shadow-lg">

<div class="max-w-7xl mx-auto flex justify-between">

<div class="flex">

<a href="index.html" class="px-6 py-4 hover:bg-blue-800 font-bold border-r">
<i class="fas fa-home"></i> HOME
</a>

<a href="services.html" class="px-6 py-4 hover:bg-blue-800 font-bold border-r">
SERVICES
</a>

<a href="schemes.html" class="px-6 py-4 hover:bg-blue-800 font-bold border-r">
SCHEMES
</a>

<a href="my_applications.php" class="px-6 py-4 hover:bg-blue-800 font-bold">
MY APPLICATIONS
</a>

</div>

<div class="flex items-center px-6">

<a href="index.html" class="bg-orange-600 px-5 py-2 rounded text-xs font-bold hover:bg-black">
Back to Portal
</a>

</div>

</div>

</nav>

<!-- PAGE CONTENT -->

<div class="max-w-7xl mx-auto py-16 px-6">

<h1 class="text-3xl font-black text-blue-900 mb-10 section-title">
My Scheme Applications
</h1>

<div class="grid md:grid-cols-3 gap-8">

<!-- SCHOLARSHIP -->

<div>

<h2 class="font-bold text-lg text-blue-700 mb-4">
<i class="fas fa-graduation-cap"></i> Scholarship
</h2>

<?php
if($scholarships->num_rows>0){
while($row=$scholarships->fetch_assoc()){
?>

<div class="bg-white p-5 rounded-xl border shadow service-card mb-4">

<div class="flex justify-between mb-2">

<span class="text-xs font-bold text-blue-600">
ID: <?php echo $row['id']; ?>
</span>

<span class="text-xs px-2 py-1 bg-green-100 text-green-700 rounded">
<?php echo $row['status']; ?>
</span>

</div>

<h3 class="font-semibold">
<?php echo $row['info']; ?>
</h3>

<p class="text-xs text-gray-500">
Applied: <?php echo date('d M Y',strtotime($row['created_at'])); ?>
</p>

</div>

<?php
}
}else{
echo "<p class='text-gray-400'>No applications</p>";
}
?>

</div>

<!-- NREGA -->

<div>

<h2 class="font-bold text-lg text-green-700 mb-4">
<i class="fas fa-person-digging"></i> MGNREGA
</h2>

<?php
if($nrega->num_rows>0){
while($row=$nrega->fetch_assoc()){
?>

<div class="bg-white p-5 rounded-xl border shadow service-card mb-4">

<div class="flex justify-between mb-2">

<span class="text-xs font-bold text-gray-500">
REF: <?php echo $row['id']; ?>
</span>

<span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-700 rounded">
<?php echo $row['status']; ?>
</span>

</div>

<h3 class="font-semibold">
<?php echo $row['info']; ?> Days Work
</h3>

<p class="text-xs text-gray-500">
Applied: <?php echo date('d M Y',strtotime($row['submitted_at'])); ?>
</p>

</div>

<?php
}
}else{
echo "<p class='text-gray-400'>No requests</p>";
}
?>

</div>

<!-- PMAY -->

<div>

<h2 class="font-bold text-lg text-orange-600 mb-4">
<i class="fas fa-house"></i> PMAY Housing
</h2>

<?php
if($pmay->num_rows>0){
while($row=$pmay->fetch_assoc()){
?>

<div class="bg-white p-5 rounded-xl border shadow service-card mb-4">

<div class="flex justify-between mb-2">

<span class="text-xs font-bold text-gray-500">
APP: <?php echo $row['id']; ?>
</span>

<span class="text-xs px-2 py-1 bg-orange-100 text-orange-700 rounded">
<?php echo $row['status']; ?>
</span>

</div>

<h3 class="font-semibold">
<?php echo $row['info']; ?> House
</h3>

<p class="text-xs text-gray-500">
Applied: <?php echo date('d M Y',strtotime($row['created_at'])); ?>
</p>

</div>

<?php
}
}else{
echo "<p class='text-gray-400'>No housing applications</p>";
}
?>

</div>

</div>

</div>

<!-- FOOTER -->

<footer class="bg-gray-900 text-white pt-12 pb-6 px-10">

<div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10 border-b border-gray-700 pb-10">

<div>

<h3 class="text-xl font-bold mb-4">Contact Us</h3>

<p class="text-sm text-gray-400">
Gram Panchayat Office<br>
Chincholi Village<br>
Jalgaon District
</p>

</div>

<div>

<h3 class="text-xl font-bold mb-4">Useful Links</h3>

<ul class="text-sm text-gray-400 space-y-2">
<li>State Govt Portal</li>
<li>Central Govt Portal</li>
<li>E-Gram Swaraj</li>
</ul>

</div>

<div>

<img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/95/Digital_India_logo.svg/1200px-Digital_India_logo.svg.png" class="h-20 invert">

</div>

</div>

<div class="text-center mt-6 text-xs text-gray-500">
© 2026 Gram Panchayat Chincholi
</div>

</footer>

</body>
</html>