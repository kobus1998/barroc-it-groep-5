<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Sales');

if (!isset($_GET['customerid'])) {
    $user->redirect('quotation_list.php?message=No customer selected');
}

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
        <h1 class="col-md-6 col-md-offset-3">Add quotation</h1>
        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\quotationController.php" method="POST">

            <input type="hidden" name="customer_id" value="<?= $_GET['customerid'] ?>">

            <div class="form-group">

                <label for="quotation_number">Quotation number</label>
                <input class="form-control" type="text" name="quotation_number" id="quotation_number">

            </div>

            <div class="form-group">

                <label for="quotation_date">Quotation date</label>
                <input class="form-control" type="text" name="quotation_date" id="quotation_date">

            </div>

            <div class="form-group">

                <label for="order_type">Order type</label>
                <input class="form-control" type="text" name="order_type" id="order_type">

            </div>

            <div class="form-group">

                <label for="description">Description</label>
                <textarea style="resize:vertical" class="form-control" name="description" id="description"></textarea>

            </div>

            <input type="submit" class="btn btn-primary pull-right" value="add quotation" name="type" style="margin-bottom:15px">

        </form>
    </div>
</div>
</body>
</html>