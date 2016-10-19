<?php
$db = Database::getInstance();

$customers = $db->pdo->
             query("SELECT * FROM `tbl_customers`")
             ->fetchAll(PDO::FETCH_ASSOC);

if($user->username == 'Sales') {

    ?>
    <!--html-->


    <?php
}

if($user->username == 'Finance') {
    ?>
    <!--html-->

    <?php

    ?>


    <?php
}

if($user->username == 'Admin') {
    ?>
    <!--html-->


    <?php
}

if($user->username == 'Development') {
    ?>
    <!--html-->


    <?php
}
