<?php
require realpath(__dir__ . '/parts/header.php');


$user->checkPage('Development');
$user->redirectMessage('project_list.php', $message);
?>
