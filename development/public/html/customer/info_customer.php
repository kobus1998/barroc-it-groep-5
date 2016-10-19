<?php
$customer_id = $_get['customerinfo'];
$sql = "SELECT * FROM `tbl_customers` WHERE id = $customer_id";
$stmt->execute()->fetchALL(PDO::FETCH_ASSOC);