<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Finance');

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
                <div class="container">
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Invoice number
                        </div>
                        <div class="panel-body">
                            <p><?php echo $invoiceDB[0]['invoice_nr'] ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Price
                        </div>
                        <div class="panel-body">
                            <p>€ <?php echo $invoiceDB[0]['price'] ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Tax
                        </div>
                        <div class="panel-body">
                            <p>€ <?php echo $invoiceDB[0]['tax'] ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Total
                        </div>
                        <div class="panel-body">
                            <p>€ <?php echo $invoiceDB[0]['total'] ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Paid
                        </div>
                        <div class="panel-body">
                            <p> <?php if($invoiceDB[0]['paid'] == 1) {
                                    echo 'yes';
                                } else {echo 'no'; } ?> </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>

