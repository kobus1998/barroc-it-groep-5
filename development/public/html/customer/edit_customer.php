<?php
require '../parts/header.php';
?>
<title>Edit Customer</title>
<style>

    .checkbox {
        width: 25px!important;
        height: 25px!important;
    }

</style>
</head>

<?php
/*
 * $_GET['edit customer'] is id of the selected customer
 *
 */
$customerID = $_GET['customerid'];
/*
 * Query
 */

if($user->getLoggedIn() != true) {
    $user->redirect('index.php?messageDanger=Youre not logged in');
}

$db = Database::getInstance();

if($user->username == 'Sales') {

    $stmt = $db->pdo->query("SELECT *
        FROM `tbl_customers`
            left join `tbl_projects`
                on `tbl_projects`.`customer_id` = `tbl_customers`.`customer_id`
            left join `tbl_appointments`
                on `tbl_appointments`.`customer_id` = `tbl_customers`.`customer_id`
            left join `tbl_invoices`
                on `tbl_invoices`.`project_id` = `tbl_projects`.`project_id`
        where `tbl_customers`.customer_id = " . $customerID);
    $sales = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

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
        <div class="edit-customer">
            <div class="container">
                <?php
                echo '<b>Company name</b>';
                echo ' ';
                echo $sales[0]['company_name'];
                echo '<br>';
                echo '<b>Contact person</b>';
                echo ' ';
                echo $sales[0]['contact_person'];
                ?>
            </div>
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
            <div class="container">
                <h1 class="text-center">Edit customer</h1>

                <form class="col-md-6 col-md-offset-3" method="post" action="<?php echo BASE_URL ?>/development/app/controller/customerController.php?customerid=<?php echo $customerID ?>">

                    <input type="hidden" name="customer_id" value="<?= $sales[0]['customer_id'] ?>">

                    <div class="form-group">

                        <label for="edit-company-name">Company name</label>
                        <input type="text" name="edit-company-name" value="<?php echo $sales[0]['company_name'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-contact-person">Contact person</label>
                        <input type="text" name="edit-contact-person" value="<?php echo $sales[0]['contact_person'] ?>" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="edit-initials">Initials</label>
                        <input type="text" name="edit-initials" value="<?= $sales[0]['initials'] ?>" class="form-control">
                    </div>

                    <br>
                    <div class="form-group">

                        <label for="edit-adress">Address</label>
                        <input type="text" name="edit-adress" value="<?php echo $sales[0]['address_1'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-zipcode">Zip-code</label>
                        <input type="text" name="edit-zipcode" value="<?php echo $sales[0]['zipcode'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-city">City</label>
                        <input type="text" name="edit-city" value="<?php echo $sales[0]['city'] ?>" class="form-control">

                    </div>
                    <br>
                    <div class="form-group">

                        <label for="edit-adress-2">Address 2</label>
                        <input type="text" name="edit-adress-2" value="<?php echo $sales[0]['address_2'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-zipcode-2">Zip-code 2</label>
                        <input type="text" name="edit-zipcode-2" value="<?php echo $sales[0]['zipcode_2'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-city-2">City 2</label>
                        <input type="text" name="edit-city-2" value="<?php echo $sales[0]['city_2'] ?>" class="form-control">

                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="edit-phone-number">Phone number</label>
                        <input type="tel" name="edit-phone-number" value="<?php echo $sales[0]['phone_number_1'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-phone-number2">Phone number 2</label>
                        <input type="tel" name="edit-phone-number2" value="<?php echo $sales[0]['phone_number_2'] ?>" class="form-control">
                    </div>

                    <div class="form-group">

                        <label for="edit-fax">Fax</label>
                        <input type="text" name="edit-fax" value="<?php echo $sales[0]['fax'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-email">Email</label>
                        <input type="email" name="edit-email" value="<?php echo $sales[0]['email'] ?>" class="form-control">

                    </div>
                    <br>
                    <div class="form-group">

                        <label for="edit-invoice-number">Invoice number</label>
                        <input type="text" name="edit-invoice-number" value="<?php echo $sales[0]['invoice_nr'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-offer-status">Offer status</label>
                        <input type="text" name="edit-offer-status" value="" class="form-control">

                    </div>

                    <div class="form-group">

                        <p style="font-weight:bold">Potential customer</p>
                        <select class="form-control" name="potential_customer" id="potential_customer"><?php
                            if ($sales[0]['potential_customer'] == 0) { ?>
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                            <?php } else if ($sales[0]['potential_customer'] == 1) { ?>
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            <?php } else { ?>
                                <option selected disabled>Select an option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="form-group">

                        <label for="edit-bank_nr">Bank number</label>
                        <input type="text" name="edit-bank_nr" value="<?php echo $sales[0]['bank_nr'] ?>" class="form-control">

                    </div>
                    <input type="submit" name="type" value="edit customer" class="btn btn-primary">
                    <br>
                    <br>
                </form>
            </div>
        </div>


    </div>
    <?php
}
if($user->username == 'Finance') {
    $finance = $db->pdo->query(" 
    SELECT *
    FROM `tbl_customers`
    left join `tbl_projects`
      on `tbl_projects`.customer_id = `tbl_customers`.customer_id
    left join `tbl_invoices`
      on `tbl_invoices`.project_id = `tbl_projects`.project_id
    WHERE `tbl_customers`.customer_id = $customerID
     ")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="header">
        <?php require '../parts/header_finance.php'; ?>
    </div>
    <div class="main-content">
    <div class="edit-customer">
    <div class="container">
        <?php
        echo '<b>Company name</b>';
        echo ' ';
        echo $finance[0]['company_name'];
        echo '<br>';
        echo '<b>Contact person</b>';
        echo ' ';
        echo $finance[0]['contact_person'];
        ?>
        </div>
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
        <div class="container">
            <h1 class="text-center">Edit customer</h1>
            <form class="col-md-6 col-md-offset-3" method="post"
                  action="<?php echo BASE_URL ?>/development/app/controller/customerController.php?customerid=<?php echo $customerID ?>">

                    <input type="hidden" name="customer_id" value="<?= $finance[0]['customer_id'] ?>">


                    <div class="form-group">

                        <label for="edit-bank-account-number">Bank account number</label>
                        <input type="text" name="edit-bank-account-number" value="<?php echo $finance[0]['bank_nr'] ?>"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-credit-balance">Credit balance</label>
                        <input type="text" name="edit-credit-balance" value="<?php echo $finance[0]['credit_balance'] ?>"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-number-invoices">Number of invoices</label>
                        <input type="text" name="edit-number-invoices"
                               value="<?php echo $finance[0]['number_of_invoices'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-gross-revenue">Gross revenue</label>
                        <input type="text" name="edit-gross-revenue" value="<?php echo $finance[0]['gross_revenue'] ?>"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-limit">Limit</label>
                        <input type="text" name="edit-limit" value="<?php echo $finance[0]['limit'] ?>"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-ledger-account-number">Ledger account number</label>
                        <input type="text" name="edit-ledger-account-number"
                               value="<?php echo $finance[0]['ledger_account_number'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-tax-code">Tax code</label>
                        <input type="text" name="edit-tax-code" value="<?php echo $finance[0]['tax'] ?>"
                               class="form-control">

                    </div>

                <div class="form-group">

                    <p style="font-weight:bold">Credit Worthy</p>
                    <select class="form-control" name="credit_worthy" id="credit_worthy"><?php
                        var_dump($sales[0]);
                        if ($sales[0]['credit_worthy'] == 0) { ?>
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                        <?php } else if ($sales[0]['credit_worthy'] == 1) { ?>
                            <option selected value="1">Yes</option>
                            <option value="0">No</option>
                        <?php } else { ?>
                            <option selected disabled>Select an option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        <?php } ?>
                    </select>

                </div>

                <input type="submit" name="type" value="edit customer" class="btn btn-primary">
            </form>
        </div>
        </div>
        </div>


        <?php
    }
    if ($user->username == 'Admin') {

        $sql = "
    SELECT * FROM `tbl_customers`
    LEFT JOIN `tbl_projects`
   	  ON `tbl_projects`.`customer_id` = `tbl_customers`.`customer_id`
    LEFT JOIN `tbl_invoices`
   	  ON `tbl_invoices`.`project_id` = `tbl_projects`.`project_id`
    LEFT JOIN `tbl_appointments`
   	  ON `tbl_appointments`.`project_id` = `tbl_projects`.`project_id`
    WHERE `tbl_customers`.customer_id = $customerID
    ";

        $stmt = $db->pdo->query($sql);
        $adminSQL = $stmt->fetchALL(PDO::FETCH_ASSOC);

        ?>
        <script>
            $(document).ready(function () {

                if ($('#potential-custom-check').val(1)) {
                    $('#potential-custom-check').prop('checked', true);
                } else if ($('#potential-custom-check').val(0)) {
                    $('#potential-custom-check').prop('checked', false);
                }
            });
        </script>

        <div class="header">
            <?php require '../parts/header_admin.php'; ?>
        </div>
        <div class="main-content">
            <div class="edit-customer">
                <div class="container">
                    <?php
                    echo '<b>Company name</b>';
                    echo ' ';
                    echo $adminSQL[0]['company_name'];
                    echo '<br>';
                    echo '<b>Contact person</b>';
                    echo ' ';
                    echo $adminSQL[0]['contact_person'];
                    ?>
                </div>
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
                <div class="container">
                    <h1 class="text-center">Edit customer</h1>
                    <form>
                        <h2>Sales</h2>

                        <div class="form-group">

                            <label for="edit-company-name">Company name</label>
                            <input type="text" name="edit-company-name" value="<?php echo $adminSQL[0]['company_name'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-contact-person">Contact person</label>
                            <input type="text" name="edit-contact-person"
                                   value="<?php echo $adminSQL[0]['contact_person'] ?>"
                                   class="form-control">

                        </div>
                        <br>
                        <div class="form-group">

                            <label for="edit-adress">Adress</label>
                            <input type="text" name="edit-adress" value="<?php echo $adminSQL[0]['address_1'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-zipcode">Zip-code</label>
                            <input type="text" name="edit-zipcode" value="<?php echo $adminSQL[0]['zipcode'] ?>"
                                   class="form-control">

                        </div>

                        <br>
                        <div class="form-group">
                            <label for="edit-phone-number">Phone number</label>
                            <input type="tel" name="edit-phone-number" value="<?php echo $adminSQL[0]['phone_number_1'] ?>"
                                   class="form-control">
                        </div>

                        <div class="form-group">

                            <label for="edit-fax">Fax</label>
                            <input type="text" name="edit-fax" value="<?php echo $adminSQL[0]['fax'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-email">Email</label>
                            <input type="email" name="edit-email" value="<?php echo $adminSQL[0]['email'] ?>"
                                   class="form-control">

                        </div>
                        <br>
                        <div class="form-group">

                            <label for="edit-invoice-number">Invoice number</label>
                            <input type="text" name="edit-invoice-number" value="<?php echo $adminSQL[0]['invoice_nr'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-offer-status">Offer status</label>
                            <input type="text" name="edit-offer-status" value="" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-potential-customer">Potential customer</label>
                            <input type="checkbox" id="potential-custom-check" name="edit-potential-customer" value="<?php echo $sales[0]['potential_customer'] ?>" class="checkbox-potential-customer"
                                <?php if($sales[0]['potential_customer'] == 1){ echo 'checked="checked"'; } else { echo ''; } ?>
                            >

                        </div>

                        <br>
                        <div class="form-group">

                            <label for="edit-appointment-day">Appointment day</label>
                            <input type="date" name="edit-appointment-day"
                                   value="<?php echo $adminSQL[0]['appointment_day'] ?>" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-last-contact-date">Last contact date</label>
                            <input type="date" name="edit-last-contact-date"
                                   value="<?php echo $adminSQL[0]['last_contact_date'] ?>" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-next-action">Next action</label>
                            <textarea name="edit-next-action"
                                      class="form-control"><?php echo $adminSQL[0]['next_action'] ?></textarea>

                        </div>

                        <h2>Finance</h2>

                        <div class="form-group">

                            <label for="edit-bank-account-number">Bank account number</label>
                            <input type="text" name="edit-bank-account-number"
                                   value="<?php echo $adminSQL[0]['bank_nr'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-credit-balance">Credit balance</label>
                            <input type="text" name="edit-credit-balance"
                                   value="<?php echo $adminSQL[0]['credit_balance'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-number-invoices">Number of invoices</label>
                            <input type="text" name="edit-number-invoices"
                                   value="<?php echo $adminSQL[0]['number_of_invoices'] ?>" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-gross-revenue">Gross revenue</label>
                            <input type="text" name="edit-gross-revenue"
                                   value="<?php echo $adminSQL[0]['gross_revenue'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-limit">Limit</label>
                            <input type="text" name="edit-limit" value="<?php echo $adminSQL[0]['limit'] ?>"
                                   class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-ledger-account-number">Ledger account number</label>
                            <input type="text" name="edit-ledger-account-number"
                                   value="<?php echo $adminSQL[0]['ledger_account_number'] ?>" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="edit-tax-code">Tax code</label>
                            <input type="text" name="edit-tax-code" value="<?php echo $adminSQL[0]['tax'] ?>"
                                   class="form-control">

                        </div>

                        <input type="submit" name="type" value="edit customer" class="btn btn-primary">

                    </form>
                    <br>
                </div>
            </div>


        </div>
        <?php
    }



