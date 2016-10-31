<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $invoices = $db->pdo->
    query("SELECT * FROM `tbl_invoices`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="invoices">
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice number</th>
                    <th>Project id</th>
                    <th>Paid</th>
                    <th>Invoice info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($invoices as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['invoice_id'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['paid'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["invoice_id"] .'">Invoice info</a></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>


    <?php
}

if($user->username == 'Finance') {
    include realpath(__DIR__. '/parts/header_finance.php');
    $invoices = $db->pdo->
    query("SELECT * FROM `tbl_invoices`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="invoices">
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice number</th>
                    <th>Project id</th>
                    <th>Paid</th>
                    <th>Invoice info</th>
                    <th>Edit invoice</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($invoices as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['invoice_id'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['paid'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["invoice_id"] .'">Invoice info</a></td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["invoice_id"] .'">Edit invoice</a></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>

    <?php
}

if($user->username == 'Admin') {
    include realpath(__DIR__. '/parts/header_admin.php');
    $invoices = $db->pdo->
    query("SELECT * FROM `tbl_invoices`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="invoices">
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice number</th>
                    <th>Project id</th>
                    <th>Paid</th>
                    <th>Invoice info</th>
                    <th>Edit invoice</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($invoices as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['invoice_id'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['paid'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["invoice_id"] .'">Invoice info</a></td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["invoice_id"] .'">Edit invoice</a></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>



    <?php
}

if($user->username == 'Development') {
    include realpath(__DIR__. '/parts/header_development.php');
    $invoices = $db->pdo->
    query("SELECT * 
           from `tbl_invoices` 
            ")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="invoices">
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice number</th>
                    <th>Project id</th>
                    <th>Paid</th>
                    <th>Invoice info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($invoices as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['invoice_id'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['paid'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["invoice_id"] .'">Invoice info</a></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>


    <?php
}
?>

