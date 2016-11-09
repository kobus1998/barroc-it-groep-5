<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Sales');

$quotationId = $_GET['quotationid'];

$stmt = $db->pdo->query("SELECT * FROM `tbl_quotations`
                 WHERE `tbl_quotations`.quotation_id = " . $quotationId);
$quotationDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                </div>
            <?php } ?>
            <h1 style="text-align:center;font-size:6rem">quotation details</h1>
            <div class="container">
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Quotation number
                    </div>
                    <div class="panel-body">
                        <p><?php echo $quotationDB[0]['quotation_number'] ?></p>
                    </div>
                </div>
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Date
                    </div>
                    <div class="panel-body">
                        <p> <?php echo $quotationDB[0]['quotation_date'] ?></p>
                    </div>
                </div>
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Order type
                    </div>
                    <div class="panel-body">
                        <p><?php echo $quotationDB[0]['order_type'] ?></p>
                    </div>
                </div>
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Description
                    </div>
                    <div class="panel-body">
                        <p><?php echo $quotationDB[0]['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

