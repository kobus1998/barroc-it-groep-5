<?php
/**
 * Created by PhpStorm.
 * User: kobus
 * Date: 11/8/2016
 * Time: 10:20 AM
 */

require_once realpath(__DIR__ . '/../parts/header.php');
$db = Database::getInstance();
$user->checkPage('Finance');
$invoiceId = $_GET['invoiceid'];

$getInvoice = Database::getInstance()->pdo->query("SELECT * FROM `tbl_invoices` WHERE invoice_id = $invoiceId")
    ->fetchAll(PDO::FETCH_ASSOC);

if($user->getUsername() == 'Finance' || $user->getUsername() == 'Admin') {
    ?>
    <div class="header">
        <?php

        if($user->getUsername() == 'Finance') {
            require '../parts/header_finance.php';
        } else {
            require '../parts/header_admin.php';
        }

        ?>
    </div>
    <div class="main-content">
        <div class="edit-invoice">
            <div class="container">
                <?php if(!isset($_GET['messageDanger']) || $_GET['messageDanger'] == '') {
                } else { ?>
                    <P class="alert-danger pull-right" style="padding: 7px!important;">
                        <?= $_GET['messageDanger'] ?>
                    </P>
                <?php }

                if(!isset($_GET['messagePrimary']) || $_GET['messagePrimary'] == '') {
                } else { ?>
                    <P class="alert-primary pull-right" style="padding: 7px!important;">
                        <?= $_GET['messagePrimary'] ?>
                    </p>
                <?php }

                if(!isset($_GET['messageSuccess']) || $_GET['messageSuccess'] == '') {
                } else { ?>
                    <P class="alert-success pull-right" style="padding: 7px!important;">
                        <?= $_GET['messageSuccess'] ?>
                    </P>
                <?php } ?>

                <form class="col-md-6 col-md-offset-3" method="post"
                      action="<?php echo BASE_URL ?>/development/app/controller/invoiceController.php?invoiceid=<?php echo $_GET['invoiceid'] ?>">

                    <div class="form-group">
                        <label for="edit-paid">Paid</label>
                        <select name="edit-paid">
                            <?php if($getInvoice[0]['paid'] == 0) { ?>
                                <option selected value="0">No</option>
                                <option value="1">Yes</option>
                           <?php } else { ?>
                                <option value="0">No</option>
                                <option selected value="1">Yes</option>
                           <?php } ?>

                        </select>
                    </div>
                    <input type="submit" value="edit invoice" name="type">
                </form>
            </div>
        </div>
    </div>
    <?php
}