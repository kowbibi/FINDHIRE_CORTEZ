<?php
// view_applications.php - View Job Applications page for the Job Application Portal
require 'core/dbconfig.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

// Sample data for applications (replace this with actual data from your database)
$applications = [
    ['job_title' => 'Software Engineer', 'applicant_name' => 'John Doe', 'status' => 'Under Review'],
    ['job_title' => 'Web Developer', 'applicant_name' => 'Jane Smith', 'status' => 'Interview Scheduled'],
    ['job_title' => 'Data Analyst', 'applicant_name' => 'Alice Johnson', 'status' => 'Application Received'],
    // Add more applications as needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applications - FindHire Portal</title>
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
        .application-list {
            margin-top: 20px;
        }
        .application-item {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .application-item h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .application-item p {
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
        <h2>View Job Applications</h2>
        <div class="application-list">
            <?php if (empty($applications)): ?>
                <p>No applications found.</p>
            <?php else: ?>
                <?php foreach ($applications as $application): ?>
    <div class="application-item">
        <div>
            <h3><?php echo htmlspecialchars($application['job_title']); ?></h3>
            <p>Applicant: <?php echo htmlspecialchars($application['applicant_name']); ?></p>
            <p>Status: <?php echo htmlspecialchars($application['status']); ?></p>
        </div>
        <!-- <a href="application_details.php?id=<?php echo $application['id']; ?>" class="btn">View Details</a> -->
    </div>
<?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>