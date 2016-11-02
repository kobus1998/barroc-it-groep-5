<?php
require realpath(__dir__ . '/../parts/header.php');

$user->checkPage('Sales');
$user->checkPage('Admin');

if (!isset($_GET['customerid'])) {
    $user->redirect('customer_list.php?message=No customer selected');
    die;
}

$customer = new Customers();
$customer->getCustomers($_GET['customerid']);
$customerData = $GLOBALS['customerData'][0];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barroc-IT</title>
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
<div class="main-content">
    <div class="container">
        <?php if (isset($_GET['message'])) {
            echo "<h2><span class='label label-danger text-center col-md-6 col-md-offset-3'>". $_GET['message'] ."</span></h2>";
        } ?>
        <h1 class="col-md-6 col-md-offset-3">Add project</h1>
        <h2 class="col-md-6 col-md-offset-3">Customer: <?php echo $customerData['company_name']; ?></h2>

        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\projectController.php" method="POST">

            <input type="hidden" name="customer_id" value="<?php echo $customerData['customer_id']; ?>">

            <div class="form-group">

                <label for="project_name">Project name</label>
                <input class="form-control" type="text" name="project_name" id="project_name">

            </div>

            <div class="form-group">

                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="6" style="resize:vertical"></textarea>

            </div>

            <div class="form-group">

                <label for="hardwaresoftware">Used hardware and software</label>
                <textarea class="form-control" name="hardwaresoftware" id="hardwaresoftware" cols="30" rows="6" placeholder="Example: hardware1, hardware2, software1" style="resize:vertical"></textarea>

            </div>

            <div class="form-group">

                <p style="font-weight:bold">Active maintenance contract</p>
                <label for="maintenance_contract"></label>
                <select name="maintenance_contract" id="maintenance_contract">
                    <option selected disabled>Selecteer een optie</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

            </div>

            <div class="form-group">

                <p style="font-weight:bold">Deadline</p>
                <input style="width:33%" class="form-control" type="text" placeholder="yyyy" name="year" id="deadline">
                <input style="width:33%" class="form-control col-md-2" type="text" placeholder="mm" name="month" id="deadline">
                <input style="width:33%" class="form-control col-md-2" type="text" placeholder="dd" name="day" id="deadline">


            </div>

            <input type="submit" class="btn btn-primary pull-right" value="add project" name="type" style="margin-bottom:15px">

        </form>
    </div>
</div>
</body>
</html>