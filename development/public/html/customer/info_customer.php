<?php
$customer_id = $_GET['customerinfo'];
$sql = "SELECT * FROM `tbl_customers` WHERE id = $customer_id";
$stmt->execute()->fetchALL(PDO::FETCH_ASSOC);