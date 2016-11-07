<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $customers = $db->pdo->query("SELECT * FROM `tbl_customers`")
                                ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-customer-list'])) {
        $searchGET = $_GET['search-customer-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_customers` WHERE `company_name` LIKE :search_query";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="customers">
        <div class="container">
            <p class="alert-danger pull-right" style="padding: 7px!important;"><?php if(isset($_GET['message'])) {echo $_GET['message']; } ?></p>
            <h2 class="text-center">Customer list</h2>
            <div class="search-customer col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search Customer
                            <input type="search" name="search-customer-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Contact person</th>
                    <th>Phone number 1</th>
                    <th>Email</th>
                    <th>Limit</th>
                    <th>Potential customer</th>
                    <th>Credit worthy</th>
                    <th>Customer info</th>
                    <th>Edit customer</th>
                    <th>Add project</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']))
                {
                    foreach ($customers as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['contact_person'] . '</td>';
                        echo '<td>' . $item['phone_number_1'] . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td>' . $item['limit'] . '</td>';
                        echo '<td>' . ($item['potential_customer'] ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . ($item['credit_worthy'] ? 'Yes' : 'No') . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '<td><a href="customer/edit_customer.php?customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '<td><a href="project/add_project.php?customerid=' . $item['customer_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
                        echo '</tr>';
                        }
                }
                if(isset($_GET['type']) && $_GET['type'] == 'search' && isset($searchResults)) {
                    foreach ($searchResults as $searchResult)
                    {
                        echo '<tr>';

                        echo '<td>' . $searchResult['company_name'] . '</td>';
                        echo '<td>' . $searchResult['contact_person'] . '</td>';
                        echo '<td>' . $searchResult['phone_number_1'] . '</td>';
                        echo '<td>' . $searchResult['email'] . '</td>';
                        echo '<td>' . $searchResult['limit'] . '</td>';
                        echo '<td>' . $searchResult['potential_customer'] . '</td>';
                        echo '<td>' . $searchResult['credit_worthy'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $searchResult["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '<td><a href="customer/edit_customer.php?customerid=' . $searchResult['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '<td><a href="project/add_project.php?customerid=' . $searchResult['customer_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';

                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['contact_person'] . '</td>';
                        echo '<td>' . $item['phone_number_1'] . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td>' . $item['limit'] . '</td>';
                        echo '<td>' . ($item['potential_customer'] ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . ($item['credit_worthy'] ? 'Yes' : 'No') . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '<td><a href="customer/edit_customer.php?customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '<td><a href="project/add_project.php?customerid=' . $item['customer_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';

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
    $customers = $db->pdo->
    query("SELECT * FROM `tbl_customers`")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-customer-list'])) {
        $searchGET = $_GET['search-customer-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_customers` WHERE `company_name` LIKE :search_query";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <!--html-->
    <section class="customers">
        <div class="container">
            <p class="alert-danger pull-right" style="padding: 7px!important;"><?php if(isset($_GET['message'])) {echo $_GET['message']; } ?></p>
            <h2 class="text-center">Customer list</h2>
            <div class="search-customer col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search Customer
                            <input type="search" name="search-customer-list">
                        </label>
                        <input class="btn btn-primary" type="submit" name="type" value="search">
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Contact person</th>
                    <th>Email</th>
                    <th>Credit balance</th>
                    <th>Gross revenue</th>
                    <th>Credit worthy</th>
                    <th>Limit</th>
                    <th>Customer info</th>
                    <th>Edit customer</th>

                </tr>
                </thead>
                <tbody>

                <?php

                if(!isset($_GET['type']))
                {
                    foreach ($customers as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['contact_person'] . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td>' . $item['credit_balance'] . '</td>';
                        echo '<td>' . $item['gross_revenue'] . '</td>';
                        echo '<td>' . ($item['credit_worthy'] ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . $item['limit'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '<td><a href="customer/edit_customer.php?customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && isset($searchResults)) {
                    foreach ($searchResults as $searchResult) {
                        echo '<tr>';
                        echo '<td>' . $searchResult['company_name'] . '</td>';
                        echo '<td>' . $searchResult['contact_person'] . '</td>';
                        echo '<td>' . $searchResult['email'] . '</td>';
                        echo '<td>' . $searchResult['credit_balance'] . '</td>';
                        echo '<td>' . $searchResult['gross_revenue'] . '</td>';
                        echo '<td>' . $searchResult['credit_worthy'] . '</td>';
                        echo '<td>' . $searchResult['limit'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $searchResult["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '<td><a href="customer/edit_customer.php?customerid=' . $searchResult['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                foreach ($searchFinance as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['company_name'] . '</td>';
                    echo '<td>' . $item['contact_person'] . '</td>';
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td>' . $item['credit_balance'] . '</td>';
                    echo '<td>' . $item['gross_revenue'] . '</td>';
                    echo '<td>' . ($item['credit_worthy'] ? 'Yes' : 'No') . '</td>';
                    echo '<td>' . $item['limit'] . '</td>';
                    echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                    echo '<td><a href="customer/edit_customer.php?customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
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
    $customers = $db->pdo->
    query("SELECT * FROM `tbl_customers`")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-customer-list'])) {
        $searchGET = $_GET['search-customer-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_customers` WHERE `company_name` LIKE :search_query";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="customers">
        <div class="container">
            <p class="alert-danger pull-right" style="padding: 7px!important;"><?php if(isset($_GET['message'])) {echo $_GET['message']; } ?></p>
            <h2 class="text-center">Customer list</h2>
            <div class="search-customer col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search Customer
                            <input type="search" name="search-customer-list">
                        </label>
                        <input class="btn btn-primary" type="submit" name="type" value="search">
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Contact person</th>
                    <th>Phone number 1</th>
                    <th>Email</th>
                    <th>Customer info</th>
                    <th>Edit customer</th>
                    <th>Add project</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($customers as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['contact_person'] . '</td>';
                        echo '<td>' . $item['phone_number_1'] . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '<td><a href="customer/edit_customer.php?customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '<td><a href="project/add_project.php?customerid=' . $item['customer_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
                        echo '</tr>';
                    }
                }
                if(isset($_GET['type']) && $_GET['type'] == 'search' && isset($searchResults)) {
                    foreach ($searchResults as $searchResult) {
                        echo '<tr>';
                        echo '<td>' . $searchResult['company_name'] . '</td>';
                        echo '<td>' . $searchResult['contact_person'] . '</td>';
                        echo '<td>' . $searchResult['phone_number_1'] . '</td>';
                        echo '<td>' . $searchResult['email'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $searchResult["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '<td><a href="customer/edit_customer.php?customerid=' . $searchResult['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '<td><a href="project/add_project.php?customerid=' . $searchResult['customer_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
                        echo '</tr>';
                    }
                } else {
                    return false;
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
    $customers = $db->pdo->
    query("SELECT * from tbl_customers WHERE (`credit_worthy` = 1) AND (`credit_balance` BETWEEN 0 AND `limit`)")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-customer-list'])) {
        $searchGET = $_GET['search-customer-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_customers` WHERE `company_name` LIKE :search_query";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <!--html-->
    <section class="customers">
        <div class="container">
            <p class="alert-danger pull-right" style="padding: 7px!important;"><?php if(isset($_GET['message'])) {echo $_GET['message']; } ?></p>
            <h2 class="text-center">Customer list</h2>
            <div class="search-customer col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search Customer
                            <input type="search" name="search-customer-list">
                        </label>
                        <input class="btn btn-primary" type="submit" name="type" value="search">
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Contact person</th>
                    <th>Phone number 1</th>
                    <th>Credit balance</th>
                    <th>Credit worthy</th>
                    <th>Email</th>
                    <th>Customer info</th>
                </tr>
                </thead>
                <tbody>

                <?php

                if(!isset($_GET['type'])) {
                    foreach ($customers as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['contact_person'] . '</td>';
                        echo '<td>' . $item['phone_number_1'] . '</td>';
                        echo '<td>' . $item['credit_balance'] . '</td>';
                        echo '<td>' . ($item['credit_worthy'] ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';
                        echo '</tr>';
                    }
                }
                if(isset($_GET['type']) && $_GET['type'] == 'search' && isset($searchResults)) {
                    foreach ($searchResults as $searchResult) {
                        echo '<tr>';

                        echo '<td>' . $searchResult['company_name'] . '</td>';
                        echo '<td>' . $searchResult['contact_person'] . '</td>';
                        echo '<td>' . $searchResult['phone_number_1'] . '</td>';
                        echo '<td>' . $searchResult['credit_balance'] . '</td>';
                        echo '<td>' . $searchResult['credit_worthy'] . '</td>';
                        echo '<td>' . $searchResult['email'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $searchResult["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';

                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['contact_person'] . '</td>';
                        echo '<td>' . $item['phone_number_1'] . '</td>';
                        echo '<td>' . $item['credit_balance'] . '</td>';
                        echo '<td>' . ($item['credit_worthy'] ? 'Yes' : 'No') . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-user"></a></td>';

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

