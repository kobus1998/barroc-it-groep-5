<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $projects = $db->pdo->
    query("
          SELECT * FROM tbl_projects
           ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_projects` WHERE `tbl_projects`.project_name like '%:searchGET%'");
        $stmt->bindParam(':searchGET', $searchGET);
        $searchSales =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="projects">
        <div class="container">
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Customer id</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchSales as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
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
    $projects = $db->pdo->
    query("SELECT * FROM `tbl_projects`")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_projects` WHERE `tbl_projects`.project_name like '%:searchGET%'");
        $stmt->bindParam(':searchGET', $searchGET);
        $searchAdmin =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="projects">
        <div class="container">
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Customer id</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>
                    <th>Add invoice</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/add_invoice.php?projectid=' . $item['project_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchAdmin as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/add_invoice.php?projectid=' . $item['project_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
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
    $projects = $db->pdo->
    query("SELECT * FROM `tbl_projects`")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_projects` WHERE `tbl_projects`.project_name like '%:searchGET%'");
        $stmt->bindParam(':searchGET', $searchGET);
        $searchAdmin =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="projects">
        <div class="container">
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Customer id</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>
                    <th>Add invoice</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/add_invoice.php?projectid=' . $item['project_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchAdmin as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/add_invoice.php?projectid=' . $item['project_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
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

if($user->username == 'Development') {
    include realpath(__DIR__. '/parts/header_development.php');
    $projects = $db->pdo->
    query("
        SELECT * FROM tbl_projects
        INNER JOIN tbl_customers
          on tbl_projects.customer_id = tbl_customers.customer_id
        WHERE tbl_customers.credit_balance BETWEEN 0 AND tbl_customers.limit
    ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_projects` WHERE `tbl_projects`.project_name like '%:searchGET%'");
        $stmt->bindParam(':searchGET', $searchGET);
        $searchDevelopment =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="projects">
        <div class="container">
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Customer id</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type'])) {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="customer/info_customer.php?customerid=' . $item["customer_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search') {
                    foreach ($searchDevelopment as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
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

