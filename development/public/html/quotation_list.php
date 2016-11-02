<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $quotations = $db->pdo->
    query("SELECT * FROM `tbl_quotations`")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-quotation-list'])) {
        $searchGET = $_GET['search-quotation-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_quotations` WHERE `tbl_quotations`.order_type like '%:searchGET%'");
        $stmt->bindParam(':searchGET', $searchGET);
        $searchSales =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="quotations">
        <div class="container">
            <h2 class="text-center">Quotation list</h2>
            <div class="search-quotation col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search order type
                            <input type="search" name="search-quotation-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Quotation number</th>
                    <th>Order type</th>
                    <th>Quotation info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($quotations as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchSales as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
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

if(isset($_GET['search-quotation-list'])) {
    $searchGET = $_GET['search-quotation-list'];

    $stmt = $db->pdo->query("SELECT * FROM `tbl_quotations` WHERE `tbl_quotations`.order_type like '%:searchGET%'");
    $stmt->bindParam(':searchGET', $searchGET);
    $searchFinance = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    ?>
    <section class="quotations">
        <div class="container">
            <h2 class="text-center">Quotation list</h2>
            <div class="search-quotation col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search order type
                            <input type="search" name="search-quotation-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Quotation number</th>
                    <th>Order type</th>
                    <th>Quotation info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($quotations as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '">Quotation info</a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchFinance as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
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

if(isset($_GET['search-quotation-list'])) {
    $searchGET = $_GET['search-quotation-list'];

    $stmt = $db->pdo->query("SELECT * FROM `tbl_quotations` WHERE `tbl_quotations`.order_type like '%:searchGET%'");
    $stmt->bindParam(':searchGET', $searchGET);
    $searchAdmin = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    ?>
    <section class="quotations">
        <div class="container">
            <h2 class="text-center">Quotation list</h2>
            <div class="search-quotation col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search order type
                            <input type="search" name="search-quotation-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Quotation number</th>
                    <th>Order type</th>
                    <th>Quotation info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($quotations as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchAdmin as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>

    <?php
}
?>

