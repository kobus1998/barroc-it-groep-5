<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Finance');

$invoiceId = $_GET['invoiceid'];

$stmt = $db->pdo->query("SELECT * FROM `tbl_invoices`
                 WHERE `tbl_invoices`.invoice_id = " . $invoiceId);
$invoiceDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>Invoice Detail</title>
</head>

<body>
    <div class="header">
        <?php 
        if($user->username == "Sales") {
            require "../parts/header_sales.php";
        } elseif($user->username == "Finance") {
            require "../parts/header_finance.php";
        } elseif($user->username == "Admin") {
            require "../parts/header_admin.php";
        }
        
        ?>
    </div>
</body>

