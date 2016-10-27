<?php
require realpath(__dir__ . '/../parts/header.php');

/*
 * Legt een connectie met de database zodat er klantgegevens kunnen worden weergeven
 * Alleen met de aangegeven customer ID
 *
 * */
$customer = $db->pdo->
query("SELECT * FROM `tbl_customers` WHERE customer_id = ". $_GET["customerid"])
    ->fetchAll(PDO::FETCH_ASSOC);
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
    include '../parts/header_sales.php';
    ?>
</div>
<div class="main-content">
    <div class="container">
        <h1 style="text-align:center;font-size:6rem">Customer details</h1>
        <div class="col-md-6">
            <ul class="pull-right" style="text-align:right;list-style:none;font-weight:bold;font-size:2rem">
                <li>Company name</li>
                <li>address 1</li>
                <li>address 2</li>
                <li>Zipcode</li>
                <li>Phone number 1</li>
                <li>Phone number 2</li>
                <li>Email</li>
                <li>Fax</li>
                <li>Contact person</li>
                <li>Internal contact person</li>
                <li>Potential customer</li>
                <li>Applications</li>
                <li>Bank number</li>
                <li>Limit</li>
                <li>Credit balance</li>
                <li>credit worthy</li>
                <li>Ledger account number</li>
                <li>Gross revenue</li>
                <li>Sales percentage</li>
                <li>Number of invoices</li>
                <li>Last contact date</li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="pull-left" style="list-style:none;font-size:2rem">
                <li><?php echo $customer[0]["company_name"] ?></li>
                <li><?php echo $customer[0]["address_1"] ?></li>
                <li><?php echo $customer[0]["address_2"] ?></li>
                <li><?php echo $customer[0]["zipcode"] ?></li>
                <li><?php echo $customer[0]["phone_number_1"] ?></li>
                <li><?php echo $customer[0]["phone_number_2"] ?></li>
                <li><?php echo $customer[0]["email"] ?></li>
                <li><?php echo $customer[0]["fax"] ?></li>
                <li><?php echo $customer[0]["contact_person"] ?></li>
                <li><?php echo $customer[0]["internal_contact_person"] ?></li>
                <li><?php echo $customer[0]["potential_customer"] ?></li>
                <li><?php echo $customer[0]["applications"] ?></li>
                <li><?php echo $customer[0]["bank_nr"] ?></li>
                <li><?php echo $customer[0]["limit"] ?></li>
                <li><?php echo $customer[0]["credit_balance"] ?></li>
                <li><?php echo $customer[0]["credit_worthy"] ?></li>
                <li><?php echo $customer[0]["ledger_account_number"] ?></li>
                <li><?php echo $customer[0]["gross_revenue"] ?></li>
                <li><?php echo $customer[0]["sales_percentage"] ?></li>
                <li><?php echo $customer[0]["number_of_invoices"] ?></li>
                <li><?php echo $customer[0]["last_contact_date"] ?></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>