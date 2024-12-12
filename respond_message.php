<?php
require 'core/dbconfig.php';

if (isset($_POST['response'])) {
    $response = $_POST['response'];
    $message_id = $_POST['message_id'];

    $query = "UPDATE messages SET response = :response WHERE id = :message_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['response' => $response, 'message_id' => $message_id]);

    header('Location: hr_messages.php');
    exit();
}
?>