<?php
// create_job.php - Create Job Post page for the Job Application Portal
require 'core/dbconfig.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data here (e.g., save to database)
    // For demonstration, we'll just redirect to a success page
    header('Location: job_post_success.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job Post - FindHire Portal</title>
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group textarea {
            resize: vertical; /* Allow vertical resizing */
            height: 150px; /* Set a default height */
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
            margin-top: 10px; /* Add margin for spacing */
            display: inline-block; /* Ensure margin works */
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <a href="dashboard.php" style="color: white; text-decoration: none;">FindHire Portal</a>
    </div>
    <div class="user-info">
        Welcome, <?php echo htmlspecialchars($user['name']); ?> | <a href="logout.php" class="btn">Logout</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <h2>Create Job Post</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" id="job_title" name="job_title" required>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description:</label>
                <textarea id="job_description" name="job_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="job_requirements">Job Requirements:</label>
                <textarea id="job_requirements" name="job_requirements" required></textarea>
            </div>
            <div class="form-group">
                <label for="job_location">Job Location:</label>
                <input type="text" id="job_location" name="job_location" required>
            </div>
            <div class="form-group">
            <label for="job_title">Salary:</label>
            <input type="text" id="salary" name="salary" required placeholder="e.g., 50000">
            </div>
            <button type="submit" class="btn">Create Job</button>
        </form>
    </div>
</div>

</body>
</html>
            