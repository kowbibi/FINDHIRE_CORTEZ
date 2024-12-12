<?php
session_start();
require 'core/dbconfig.php'; // Ensure this file contains your database connection logic

// Check if the job ID is provided
if (!isset($_GET['job_id'])) {
    die("Job ID is required.");
}

$job_id = intval($_GET['job_id']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $applicant_name = $_POST['applicant_name'];
    $applicant_email = $_POST['applicant_email'];
    $cover_letter = $_POST['cover_letter'];

    // Insert the application into the database
    $query = "INSERT INTO applications (job_id, applicant_name, applicant_email, cover_letter) VALUES (:job_id, :applicant_name, :applicant_email, :cover_letter)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'job_id' => $job_id,
        'applicant_name' => $applicant_name,
        'applicant_email' => $applicant_email,
        'cover_letter' => $cover_letter
    ]);

    // Redirect to a success page or display a success message
    header("Location: success.php"); // Create a success.php page to show a success message
    exit();
}

// Fetch job details for display
$query = "SELECT * FROM jobs WHERE id = :job_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['job_id' => $job_id]);
$job = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$job) {
    die("Job not found."); // This will help you identify if the job ID is invalid
}
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px;
        }
        .application-form {
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5 px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="application-form">
        <h1>Apply for <?php echo htmlspecialchars($job['job_title']); ?></h1>
        <form action="" method="post">
            <label for="applicant_name">Name:</label>
            <input type="text" id="applicant_name" name="applicant_name" required>

            <label for="applicant_email">Email:</label>
            <input type="email" id="applicant_email" name="applicant_email" required>

            <label for="cover_letter">Cover Letter:</label>
            <textarea id="cover_letter" name="cover_letter" rows="5" required></textarea>

            <button type="submit">Submit Application</button>
        </form>
    </div>
</body>
</html>