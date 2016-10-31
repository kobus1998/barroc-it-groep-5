<?php
require realpath(__dir__ . '/parts/header.php');

$user->checkPage('Sales');
$user->redirectMessage('customer_list.php', $message);
?>
