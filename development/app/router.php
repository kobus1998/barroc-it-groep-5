<?php require realpath(__DIR__ . '/init.php');

$username = $user->username;

switch($username) {
    case 'Sales':
        $message = 'Succesfully redirected to sales';
        $user->redirectMessage('sales.php', $message);
        break;
    case 'Finance':
        $message = 'Succesfully redirected to finance';
        $user->redirectMessage('finance.php', $message);
        break;
    case 'Development':
        $message = 'Succesfully redirected to development';
        $user->redirectMessage('development.php', $message);
        break;
    case 'Admin':
        $message = 'Succesfully redirected to admin';
        $user->redirectMessage('admin.php', $message);
        break;
}?>