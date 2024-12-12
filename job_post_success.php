<?php
// job_post_success.php - Success page after creating a job post
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
    <title>Job Post Success - FindHire Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #68ddfa 0%,  #55c0db 0%, #e43df3 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            color: #333;
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
            margin-top: 20px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Job Post Created Successfully!</h2>
    <p>Your job post has been successfully created. You can now view it in your dashboard.</p>
    <a href="dashboard.php" class="btn">Go to Dashboard</a>
</div>

</body>
</html>