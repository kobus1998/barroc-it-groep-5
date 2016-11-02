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
        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\customerController.php" method="POST">
            <div class="form-group">

                <label for="company_name">company name</label>
                <input class="form-control" type="text" name="company_name" id="company_name">

            </div>

            <div class="form-group">

                <label for="address_1">address</label>
                <input class="form-control" type="text" name="address_1" id="address_1">

            </div>

            <div class="form-group">

                <label for="address_2">address 2</label>
                <input class="form-control" type="text" name="address_2" id="address_2">

            </div>

            <div class="form-group">

                <label for="zipcode">zipcode</label>
                <input class="form-control" type="text" name="zipcode" id="zipcode">

            </div>

            <div class="form-group">

                <label for="phone_number_1">phone number</label>
                <input class="form-control" type="text" name="phone_number_1" id="phone_number_1">

            </div>

            <div class="form-group">

                <label for="phone_number_2">phone number 2</label>
                <input class="form-control" type="text" name="phone_number_2" id="phone_number_2">

            </div>

            <div class="form-group">

                <label for="email">email</label>
                <input class="form-control" type="text" name="email" id="email">

            </div>

            <div class="form-group">

                <label for="fax">fax</label>
                <input class="form-control" type="text" name="fax" id="fax">

            </div>

            <div class="form-group">

                <label for="contact_person">contact person</label>
                <input class="form-control" type="text" name="contact_person" id="contact_person">

            </div>

            <div class="form-group">

                <label for="internal_contact_person">internal contact person</label>
                <input class="form-control" type="text" name="internal_contact_person" id="internal_contact_person">

            </div>

            <div class="form-group">

                <label for="bank_nr">bank number</label>
                <input class="form-control" type="text" name="bank_nr" id="bank_nr">

            </div>

            <input type="submit" class="btn btn-primary pull-right" value="add customer" name="type" style="margin-bottom:15px">

        </form>
    </div>
</div>
</body>
</html>