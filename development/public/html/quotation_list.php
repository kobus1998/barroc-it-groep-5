<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $quotations = $db->pdo->
    query("SELECT * FROM `tbl_quotations`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="quotations">
        <div class="container">
            <h2 class="text-center">Quotation list</h2>
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Quotation number</th>
                    <th>Order type</th>
                    <th>Quotation info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($quotations as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['quotation_id'] . '</td>';
                    echo '<td>' . $item['quotation_nr'] . '</td>';
                    echo '<td>' . $item['order_type'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["quotation_id"] .'">Quotation info</a></td>';
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
    $quotations = $db->pdo->
    query("SELECT * FROM `tbl_quotations`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="quotations">
        <div class="container">
            <h2 class="text-center">Quotation list</h2>
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Quotation number</th>
                    <th>Order type</th>
                    <th>Quotation info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($quotations as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['quotation_id'] . '</td>';
                    echo '<td>' . $item['quotation_nr'] . '</td>';
                    echo '<td>' . $item['order_type'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["quotation_id"] .'">Quotation info</a></td>';
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
    $quotations = $db->pdo->
    query("SELECT * FROM `tbl_quotations`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="quotations">
        <div class="container">
            <h2 class="text-center">Quotation list</h2>
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Quotation number</th>
                    <th>Order type</th>
                    <th>Quotation info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($quotations as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['quotation_id'] . '</td>';
                    echo '<td>' . $item['quotation_nr'] . '</td>';
                    echo '<td>' . $item['order_type'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["quotation_id"] .'">Quotation info</a></td>';
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

