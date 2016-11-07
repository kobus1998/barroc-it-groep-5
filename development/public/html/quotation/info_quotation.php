<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Finance');

var_dump($_GET);
die;

$invoiceId = $_GET['quotationid'];

$stmt = $db->pdo->query("SELECT * FROM `tbl_quotations`
                 WHERE `tbl_quotations`.quotation_id = " . $quotationId);
$quotationDB = $stmt->fetchAll(PDO::FETCH_ASSOC);

$customerID = $customerDB[0]['customer_id']
?>
<title>Quotation Detail</title>
<meta charset="UTF-8">
</head>

<body>
<div class="header">
    <?php
    if($user->username == "Sales") {
        require "../parts/header_sales.php";
    } elseif($user->username == "Admin") {
        require "../parts/header_admin.php";
    }

    ?>
</div>
<div class="main">
    <div class="container">
        <div class="container">
            <?php if($user->username == 'Admin' || $user->username == 'Sales'){ ?>
                <div class="container">
                    <?php echo "<a href='edit_quotation.php?quotationid=$quotationId'>Edit this quotation</a>" ?><br>
                    <?php echo "<a href='../customer/info_customer.php?customerid=$customerId'>Quotation from customer</a>" ?>
                </div>
            <?php } ?>
            <h1 style="text-align:center;font-size:6rem">quotation details</h1>
            <div class="container">
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Invoice number
                    </div>
                    <div class="panel-body">
                        <p><?php echo $quotationDB[0]['quotation_number'] ?></p>
                    </div>
                </div>
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Price
                    </div>
                    <div class="panel-body">
                        <p>€ <?php echo $invoiceDB[0]['quotation_date'] ?></p>
                    </div>
                </div>
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Tax
                    </div>
                    <div class="panel-body">
                        <p><?php echo $invoiceDB[0]['quotation_type'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

