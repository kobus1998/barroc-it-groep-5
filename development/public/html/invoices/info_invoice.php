<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Finance');
$user->checkPage('Admin');

$invoiceId = $_GET['invoiceid'];

$stmt = $db->pdo->query("SELECT * FROM `tbl_invoices`
                 WHERE `tbl_invoices`.invoice_id = " . $invoiceId);
$invoiceDB = $stmt->fetchAll(PDO::FETCH_ASSOC);

$projectId = $invoiceDB[0]['project_id']
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
    <div class="main">
        <div class="container">
            <div class="container">
                <?php if($user->username == 'Admin' || $user->username == 'Finance'){ ?>
                    <div class="container">
                        <?php echo "<a href='edit_invoice.php?invoiceid=$invoiceId'>Edit this invoice</a>" ?><br>
                        <?php echo "<a href='../project/info_project.php?projectid=$projectId'>Invoice from project</a>" ?>
                    </div>
                <?php } ?>
            <h1 style="text-align:center;font-size:6rem">Invoice details</h1>
            <div class="col-md-6 row">
                <ul class="pull-right" style="list-style: none; font-weight: bold;">
                    <li>Invoice nr</li>
                    <li>Price</li>
                    <li>Tax</li>
                    <li>Total</li>
                    <li>Paid</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="" style="list-style: none">
                    <li><?php echo $invoiceDB[0]['invoice_nr'] ?></li>
                    <li>€ <?php echo $invoiceDB[0]['price'] ?></li>
                    <li>€ <?php echo $invoiceDB[0]['tax'] ?></li>
                    <li>€ <?php echo $invoiceDB[0]['total'] ?></li>
                    <li><?php if( $invoiceDB[0]['paid'] == 1 ){
                            echo 'Yes';
                        } else {echo 'No';} ?></li>
                </ul>
            </div>
        </div>
    </div>
</body>

