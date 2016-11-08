<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Finance') {
    include realpath(__DIR__. '/parts/header_finance.php');
    $invoices = $db->pdo->
    query("SELECT * FROM `tbl_invoices`
          LEFT JOIN `tbl_projects`
            ON `tbl_projects`.project_id = `tbl_invoices`.project_id
          LEFT JOIN `tbl_customers`
            on `tbl_customers`.customer_id = `tbl_projects`.customer_id
          WHERE tbl_invoices.paid = 0
          ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-invoice-list'])) {
        $searchGET = $_GET['search-invoice-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_invoices` 
                      WHERE tbl_invoices.invoice_nr LIKE :search_query 
                      AND tbl_invoices.paid = 0";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();


    }
    ?>
    <section class="invoices">
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

            <h2 class="text-center">Invoice list</h2>
            <div class="search-invoice col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search invoice number
                            <input type="search" name="search-invoice-list" value="<?php if(isset($_GET['search-invoice-list'])) {echo $searchGET; } ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Invoice number</th>
                    <th>Project id</th>
                    <th>Paid</th>
                    <th>Invoice info</th>
                    <th>Edit invoice</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-invoice-list'] == '') {
                    foreach ($invoices as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/edit_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-invoice-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
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
                      
          WHERE tbl_invoices.paid = 0
          ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-invoice-list'])) {
        $searchGET = $_GET['search-invoice-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_invoices` 
                      WHERE tbl_invoices.invoice_nr LIKE :search_query 
                      AND tbl_invoices.paid = 0";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="invoices">
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
            <h2 class="text-center">Invoice list</h2>
            <div class="search-invoice col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search invoice number
                            <input type="search" name="search-invoice-list" value="<?php if(isset($_GET['search-invoice-list'])) {echo $searchGET; } ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Invoice number</th>
                    <th>Project id</th>
                    <th>Paid</th>
                    <th>Invoice info</th>
                    <th>Edit invoice</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-invoice-list'] == '') {
                    foreach ($invoices as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['invoice_nr'] . '</td>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['paid'] . '</td>';
                        echo '<td><a href="invoices/info_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/edit_invoice.php?invoiceid=' . $item["invoice_id"] . '" class="btn btn-info glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-invoice-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
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

