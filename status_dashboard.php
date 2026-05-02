<?php
session_start();
// Agar user login nahi hai to login page par bhejein (Example logic)
if (!isset($_SESSION['user_email'])) {
    $_SESSION['user_email'] = "test@user.com"; // Testing ke liye dummy email
}
$user_email = $_SESSION['user_email'];

$conn = new mysqli("localhost", "root", "", "gram_panchayat"); // Scholarship DB
$conn_nrega = new mysqli("localhost", "root", "", "gram_panchayat"); // MGNREGA DB

// 1. Scholarship Applications nikalna
$sql1 = "SELECT app_id, course, status, created_at FROM scholarship_applications WHERE user_email = '$user_email'";
$scholarships = $conn->query($sql1);

// 2. MGNREGA Work Requests nikalna
$sql2 = "SELECT ref_id, days_count, status, submitted_at FROM mgnrega_requests WHERE user_email = '$user_email'";
$mgnrega = $conn_nrega->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;900&display=swap" rel="stylesheet">
    <title>My Applications | Chincholi Portal</title>
    <style>body { font-family: 'Outfit', sans-serif; background: #f8fafc; }</style>
</head>
<body class="p-5 md:p-10">

    <div class="max-w-6xl mx-auto">
        <header class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-[900] text-slate-800 tracking-tighter">My Application Status</h1>
                <p class="text-slate-500 font-bold uppercase text-xs tracking-widest mt-2">Tracking for: <?php echo $user_email; ?></p>
            </div>
            <a href="index.html" class="bg-white px-6 py-3 rounded-2xl font-black text-xs border-2 border-slate-100 hover:bg-slate-50 transition-all">BACK TO HOME</a>
        </header>

        <div class="grid md:grid-cols-2 gap-10">
            
            <div class="space-y-6">
                <h2 class="text-xl font-black text-blue-800 flex items-center gap-3">
                    <i class="fas fa-graduation-cap"></i> Scholarship Applications
                </h2>
                
                <?php if($scholarships->num_rows > 0): ?>
                    <?php while($row = $scholarships->fetch_assoc()): ?>
                    <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl transition-all">
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-blue-50 text-blue-700 px-4 py-1 rounded-full text-[10px] font-black uppercase"><?php echo $row['app_id']; ?></span>
                            <span class="px-3 py-1 rounded-lg text-[10px] font-bold uppercase <?php echo ($row['status']=='Approved'?'bg-green-100 text-green-700':'bg-amber-100 text-amber-700'); ?>">
                                <?php echo $row['status']; ?>
                            </span>
                        </div>
                        <h3 class="text-lg font-black text-slate-800"><?php echo $row['course']; ?></h3>
                        <p class="text-slate-400 text-xs font-medium mt-1">Applied on: <?php echo date('d M, Y', strtotime($row['created_at'])); ?></p>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="bg-slate-100 p-10 rounded-[2.5rem] text-center text-slate-400 font-bold text-sm">No Scholarship requests found.</div>
                <?php endif; ?>
            </div>

            <div class="space-y-6">
                <h2 class="text-xl font-black text-green-800 flex items-center gap-3">
                    <i class="fas fa-tools"></i> MGNREGA Work Demand
                </h2>

                <?php if($mgnrega->num_rows > 0): ?>
                    <?php while($row = $mgnrega->fetch_assoc()): ?>
                    <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl transition-all border-l-8 border-l-green-600">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-mono text-xs font-black text-slate-500"><?php echo $row['ref_id']; ?></span>
                            <span class="px-3 py-1 rounded-lg text-[10px] font-bold uppercase bg-slate-100 text-slate-600">
                                <?php echo $row['status']; ?>
                            </span>
                        </div>
                        <h3 class="text-lg font-black text-slate-800"><?php echo $row['days_count']; ?> Days Employment Request</h3>
                        <p class="text-slate-400 text-xs font-medium mt-1">Submitted: <?php echo date('d M, Y', strtotime($row['submitted_at'])); ?></p>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="bg-slate-100 p-10 rounded-[2.5rem] text-center text-slate-400 font-bold text-sm">No MGNREGA requests found.</div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</body>
</html>