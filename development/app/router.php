<?php require realpath(__DIR__ . '/init.php');

$username = $user->username;

switch($username) {
    case 'sales':
        $message = 'Succesfully redirected to sales';
        $user->redirectMessage('sales.php', $message);
        break;
    case 'finance':
        $message = 'Succesfully redirected to finance';
        $user->redirectMessage('finance.php', $message);
        break;
    case 'development':
        $message = 'Succesfully redirected to development';
        $user->redirectMessage('development.php', $message);
        break;
    case 'admin':
        $message = 'Succesfully redirected to admin';
        $user->redirectMessage('admin.php', $message);
        break;
}?>