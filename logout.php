<?php
// logout.php - Logout page for the Job Application Portal
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to the confirmation page
header('Location: logout_confirmation.php');
exit();