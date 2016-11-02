<?php
require realpath(__dir__ . '/parts/header.php');

// Only let people in with the username of the given department
$user->checkPage('Admin');
$user->redirectMessage('register.php', $message);
?>
