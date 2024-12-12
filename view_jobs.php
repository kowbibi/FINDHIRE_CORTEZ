<?php
// view_jobs.php - View Job Listings page for the Job Application Portal
require 'core/dbconfig.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

// Fetch job listings from the database
$query = "SELECT * FROM jobs"; // Adjust the query as needed
$stmt = $pdo->query($query);
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jobs - FindHire Portal</title>
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
        .navbar .logo a {
            color: white;
            text-decoration: none;
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
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .job-list {
            margin-top: 20px;
        }
        .job-item {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .job-item h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .job-item p {
            margin: 5px 0;
            color: #666;
        }
        .btn {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-top: 10px;
            display: inline-block;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <a href="dashboard.php">FindHire Portal</a>
    </div>
    <div class="user-info">
        Welcome, <?php echo htmlspecialchars($user['name']); ?> | <a href="logout.php" class="btn">Logout</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <h2>Available Job Listings</h2>
        <div class="job-list">
            <?php if (empty($jobs)): ?>
                <p>No jobs found.</p>
            <?php else: ?>
                <?php foreach ($jobs as $job): ?>
                    <div class="job-item">
                        <div>
                            <h3><?php echo htmlspecialchars($job['job_title']); ?></h3>
                            <p>Company: <?php echo htmlspecialchars($job['company_name']); ?></p>
                            <p>Location: <?php echo htmlspecialchars($job['location']); ?></p>
                        </div>
                        <a href="apply.php?job_id=<?php echo $job['id']; ?>" class="btn">Apply Now</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>