<?php
// handleforms.php - Handles all form submissions and actions

require_once 'dbconfig.php'; // Include database configuration
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'login':
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Authenticate user
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: dashboard.php');
            } else {
                echo "Invalid email or password.";
            }
            break;

        case 'createJobPost':
            $title = $_POST['title'];
            $description = $_POST['description'];
            $createdBy = $_SESSION['user']['id'];

            // Insert job post into the database
            $stmt = $pdo->prepare("INSERT INTO job_posts (title, description, created_by) VALUES (?, ?, ?)");
            $stmt->execute([$title, $description, $createdBy]);
            echo "Job post created successfully.";
            break;

        case 'applyToJob':
            $jobId = $_POST['job_id'];
            $applicantId = $_SESSION['user']['id'];

            // Insert application into the database
            $stmt = $pdo->prepare("INSERT INTO applications (job_id, applicant_id) VALUES (?, ?)");
            $stmt->execute([$jobId, $applicantId]);
            echo "Application submitted successfully.";
            break;

        case 'sendMessage':
            $recipientId = $_POST['recipient_id'];
            $message = $_POST['message'];
            $senderId = $_SESSION['user']['id'];

            // Insert message into the database
            $stmt = $pdo->prepare("INSERT INTO messages (sender_id, recipient_id, message) VALUES (?, ?, ?)");
            $stmt->execute([$senderId, $recipientId, $message]);
            echo "Message sent successfully.";
            break;

        default:
            echo "Invalid action.";
    }
}
?>
