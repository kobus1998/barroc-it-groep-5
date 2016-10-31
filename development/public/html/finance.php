<?php
require realpath(__dir__ . '/parts/header.php');

$user->checkPage('Finance');
$user->redirectMessage('invoice_list.php', $message);
?>
