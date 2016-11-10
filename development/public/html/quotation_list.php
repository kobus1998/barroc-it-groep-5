<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $quotations = $db->pdo->
    query("SELECT * FROM tbl_quotations
        INNER JOIN tbl_customers
          on tbl_quotations.customer_id = tbl_customers.customer_id
        WHERE tbl_customers.credit_balance BETWEEN 0 AND tbl_customers.`limit` ORDER BY `customer_id` DESC")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-quotation-list'])) {
        $searchGET = $_GET['search-quotation-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_quotations` 
                      INNER JOIN tbl_customers
                      on tbl_quotations.customer_id = tbl_customers.customer_id
                      WHERE `quotation_number` LIKE :search_query ORDER BY `customer_id` DESC";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="quotations">
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
            <h2 class="text-center">Quotation list</h2>
            <div class="search-quotation col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search order type
                            <input type="search" name="search-quotation-list" value="<?php if(isset($_GET['search-quotation-list'])) {echo $_GET['search-quotation-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
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
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="quotation/info_quotation.php?quotationid=' . $item["quotation_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="quotation/info_quotation.php?quotationid=' . $item["quotation_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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
    query("SELECT * FROM tbl_quotations
        INNER JOIN tbl_customers
          on tbl_quotations.customer_id = tbl_customers.customer_id
        WHERE tbl_customers.credit_balance BETWEEN 0 AND tbl_customers.`limit` ORDER BY `customer_id` DESC")
        ->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['search-quotation-list'])) {
    $searchGET = $_GET['search-quotation-list'];
    $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
    $searchQuery = '%'.$searchQuery.'%';

    $searchSQL = "SELECT * FROM `tbl_quotations` 
                      INNER JOIN tbl_customers
                      on tbl_quotations.customer_id = tbl_customers.customer_id
                      WHERE `quotation_number` LIKE :search_query ORDER BY `customer_id` DESC";

    $stmt = $db->pdo->prepare($searchSQL);
    $stmt->bindParam(':search_query', $searchQuery);
    $stmt->execute();

    $searchResults = $stmt->fetchAll();
}
    ?>
    <section class="quotations">
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
            <h2 class="text-center">Quotation list</h2>
            <div class="search-quotation col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search order type
                            <input type="search" name="search-quotation-list" value="<?php if(isset($_GET['search-quotation-list'])) {echo $_GET['search-quotation-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
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
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="quotation/info_quotation.php?customerid=' . $item["customer_id"] . '">Quotation info</a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="quotation/info_quotation.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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
    query("SELECT * FROM tbl_quotations
        INNER JOIN tbl_customers
          on tbl_quotations.customer_id = tbl_customers.customer_id
        WHERE tbl_customers.credit_balance BETWEEN 0 AND tbl_customers.`limit` ORDER BY `customer_id` DESC")
        ->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['search-quotation-list'])) {
    $searchGET = $_GET['search-quotation-list'];
    $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
    $searchQuery = '%'.$searchQuery.'%';

    $searchSQL = "SELECT * FROM `tbl_quotations` 
                      INNER JOIN tbl_customers
                      on tbl_quotations.customer_id = tbl_customers.customer_id
                      WHERE `quotation_number` LIKE :search_query ORDER BY `customer_id` DESC";

    $stmt = $db->pdo->prepare($searchSQL);
    $stmt->bindParam(':search_query', $searchQuery);
    $stmt->execute();

    $searchResults = $stmt->fetchAll();
}
    ?>
    <section class="quotations">
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
            <h2 class="text-center">Quotation list</h2>
            <div class="search-quotation col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search order type
                            <input type="search" name="search-quotation-list" value="<?php if(isset($_GET['search-quotation-list'])) {echo $_GET['search-quotation-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
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
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="quotation/info_quotation.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['quotation_number'] . '</td>';
                        echo '<td>' . $item['order_type'] . '</td>';
                        echo '<td><a href="quotation/info_quotation.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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

