<?php
require 'core/dbconfig.php';

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $hr_id = $_POST['hr_id'];
    $applicant_id = $_POST['applicant_id'];

    $query = "INSERT INTO messages (applicant_id, hr_id, message) VALUES (:applicant_id, :hr_id, :message)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['applicant_id' => $applicant_id, 'hr_id' => $hr_id, 'message' => $message]);

    header('Location: my_applications.php');
    exit();
}
?>