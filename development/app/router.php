<?php require realpath(__DIR__ . '/init.php');

$username = $user->username;

switch($username) {
    case 'Sales':
        $message = 'You have been redirected to Sales';
        $user->redirectMessage('sales.php', $message);
        break;
    case 'Finance':
        $message = 'You have been redirected to Finance';
        $user->redirectMessage('finance.php', $message);
        break;
    case 'Development':
        $message = 'You have been redirected to Development';
        $user->redirectMessage('development.php', $message);
        break;
    case 'Admin':
        $message = 'You have been redirected to Admin';
        $user->redirectMessage('admin.php', $message);
        break;
}?>