<?php
// dashboard.php - Dashboard page for the Job Application Portal
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindHire Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #68ddfa 0%,  #55c0db 0%, #e43df3 100%);
        }
        .navbar {
            background: #007bff;
            padding: 25px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .logo {
            font-size: 25px;
            font-weight: bold;
        }
        .navbar .user-info {
            font-size: 20px;
        }
        .container {
            padding: 50px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .card h2 {
            margin-top: 10px; 
        }
        .btn {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 20px;
            margin: 5px 5px; 
            display: inline-block; /* Ensures the margin works correctly */
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">FindHire Portal</div>
    <div class="user-info">
        Welcome, <?php echo htmlspecialchars($user['name']); ?> | <a href="logout.php" class="btn">Logout</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <h2>Your Role: <?php echo htmlspecialchars($user['role']); ?></h2>
        <?php if ($user['role'] === 'HR'): ?>
            <p><a href="create_job.php" class="btn">Create Job Post</a></p>
            <p><a href="view_applications.php" class="btn">View Applications</a></p>
        <?php elseif ($user['role'] === 'Applicant'): ?>
            <p><a href="view_jobs.php" class="btn">View Job Listings</a></p>
            <p><a href="my_applications.php" class="btn">My Applications</a></p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>