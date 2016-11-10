<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Sales');

if (!isset($_GET['quotationid'])) {
    $user->redirect('quotation_list.php?message=No customer selected');
}

$sql = "SELECT * FROM tbl_quotations
                LEFT JOIN tbl_customers
                  on tbl_customers.customer_id = tbl_quotations.customer_id
                WHERE quotation_id = :quotation_id";

$stmt = $db->pdo->prepare($sql);
$stmt->bindParam(':quotation_id', $_GET['quotationid']);
$stmt->execute();

$quotation = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<title>Add quotation</title>
</head>

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

<div class="main-content">
    <div class="container">
        <p class="alert-danger pull-right" style="padding: 7px!important;"><?php if(isset($_GET['message'])) {echo $_GET['message']; } ?></p>
        <h1 class="col-md-6 col-md-offset-3">Edit quotation</h1>
        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\quotationController.php" method="POST">

            <input type="hidden" name="customer_id" value="<?= $_GET['customerid'] ?>">
            <input type="hidden" name="quotation_id" value="<?= $_GET['quotationid'] ?>">

            <div class="form-group">

                <label for="quotation_number">Quotation number</label>
                <input class="form-control" type="text" name="quotation_number" id="quotation_number" value="<?= $quotation[0]['quotation_number'] ?>">

            </div>

            <div class="form-group">

                <label for="quotation_date">Quotation date</label>
                <input class="form-control" type="date" name="quotation_date" id="quotation_date" value="<?= $quotation[0]['quotation_date'] ?>">

            </div>

            <div class="form-group">

                <label for="order_type">Order type</label>
                <input class="form-control" type="text" name="order_type" id="order_type" value="<?= $quotation[0]['order_type'] ?>">

            </div>

            <div class="form-group">

                <label for="description">Description</label>
                <textarea style="resize:vertical" class="form-control" name="description" id="description"><?= $quotation[0]['description'] ?></textarea>

            </div>

            <input type="submit" class="btn btn-primary pull-right" value="edit quotation" name="type" style="margin-bottom:15px">

        </form>
    </div>
</div>
</body>
</html>