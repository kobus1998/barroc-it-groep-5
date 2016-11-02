<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $invoices = $db->pdo->
    query("SELECT * FROM `tbl_invoices`
          LEFT JOIN `tbl_projects`
            ON `tbl_projects`.project_id = `tbl_invoices`.project_id
          LEFT JOIN `tbl_customers`
            on `tbl_customers`.customer_id = `tbl_projects`.customer_id          
          ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-invoice-list'])) {
        $searchGET = $_GET['search-invoice-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_invoices` WHERE `tbl_invoices`.invoice_nr like '%$searchGET%'");
        $searchSales =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="invoices">
        <div class="container">
            <h2 class="text-center">Invoice list</h2>
            <div class="search-invoice col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search invoice number
                            <input type="search" name="search-invoice-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
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
                if(!isset($_GET['type'])) {
                    foreach ($invoices as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_id'] . '</td>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchSales as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_id'] . '</td>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
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
    $invoices = $db->pdo->
    query("SELECT * FROM `tbl_invoices`
          LEFT JOIN `tbl_projects`
            ON `tbl_projects`.project_id = `tbl_invoices`.project_id
          LEFT JOIN `tbl_customers`
            on `tbl_customers`.customer_id = `tbl_projects`.customer_id          
          ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-invoice-list'])) {
        $searchGET = $_GET['search-invoice-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_invoices` WHERE `tbl_invoices`.invoice_nr like '%$searchGET%'");
        $searchFinance =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="invoices">
        <div class="container">
            <h2 class="text-center">Invoice list</h2>
            <div class="search-invoice col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search invoice number
                            <input type="search" name="search-invoice-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
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
                if(!isset($_GET['type'])) {
                    foreach ($invoices as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_id'] . '</td>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/edit_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchFinance as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_id'] . '</td>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/edit_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-pencil"></a></td>';
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
    $invoices = $db->pdo->
    query("SELECT * FROM `tbl_invoices`
          LEFT JOIN `tbl_projects`
            ON `tbl_projects`.project_id = `tbl_invoices`.project_id
          LEFT JOIN `tbl_customers`
            on `tbl_customers`.customer_id = `tbl_projects`.customer_id          
          ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-invoice-list'])) {
        $searchGET = $_GET['search-invoice-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_invoices` WHERE `tbl_invoices`.invoice_nr like '%$searchGET%'");
        $searchAdmin =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="invoices">
        <div class="container">
            <h2 class="text-center">Invoice list</h2>
            <div class="search-invoice col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search invoice number
                            <input type="search" name="search-invoice-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
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
                if(!isset($_GET['type'])) {
                    foreach ($invoices as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_id'] . '</td>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/edit_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchAdmin as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_id'] . '</td>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/edit_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-pencil"></a></td>';
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

