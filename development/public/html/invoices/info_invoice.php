<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Finance');

$invoiceId = $_GET['invoiceid'];

$db->pdo->query("SELECT * FROM `tbl_invoices`
                  
");