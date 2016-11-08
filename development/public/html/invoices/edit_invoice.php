<?php
/**
 * Created by PhpStorm.
 * User: kobus
 * Date: 11/8/2016
 * Time: 10:20 AM
 */

require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();
$user->checkPage($user->username);
$invoiceId = $_GET['invoiceid'];


if($user->username() == 'Finance' || $user->username() == 'Admin') {
    ?>
    <div class="header">
        <?php

        if($user->username() == 'Finance') {
            require '../parts/header_finance.php';
        } else {
            require '../parts/header_admin.php';
        }

        ?>
    </div>
    <div class="main-content">
        
    </div>
    <?php
}