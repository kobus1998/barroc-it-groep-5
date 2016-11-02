<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Sales');
$user->checkPage('Admin');
?>
<title>Add quotation</title>
</head>

<div class="header">
    <?php require realpath(__DIR__ . '/../parts/header_sales.php'); ?>
</div>

<div class="main-content">
    <div class="container">
        <?php if (isset($_GET['message'])) {
            echo "<h2><span class='label label-danger text-center col-md-6 col-md-offset-3'>". $_GET['message'] ."</span></h2>";
        } ?>
        <h1 class="col-md-6 col-md-offset-3">Add quotation</h1>
        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\quotationController.php" method="POST">
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

            <input type="submit" class="btn btn-primary pull-right" value="add quotation" name="type" style="margin-bottom:15px">

        </form>
    </div>
</div>
</body>
</html>