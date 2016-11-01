<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $projects = $db->pdo->
    query("SELECT * FROM `tbl_projects`")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_projects` WHERE `tbl_projects`.project_name like '%$searchGET%'");
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
                    <th>#</th>
                    <th>Customer id</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($projects as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['project_id'] . '</td>';
                    echo '<td>' . $item['customer_id'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['deadline'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                    echo '</tr>';
                }

                if($_GET['type'] == 'search') {
                    foreach ($search as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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

        $stmt = $db->pdo->query("SELECT * FROM `tbl_projects` WHERE `tbl_projects`.project_name like '%$searchGET%'");
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
                    <th>#</th>
                    <th>Customer id</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($projects as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['project_id'] . '</td>';
                    echo '<td>' . $item['customer_id'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['deadline'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'">Project info</a></td>';
                    echo '</tr>';
                }

                if($_GET['type'] == 'search') {
                    foreach ($search as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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
    query("SELECT * 
           from `tbl_projects` 
            ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];

        $stmt = $db->pdo->query("SELECT * FROM `tbl_projects` WHERE `tbl_projects`.project_name like '%$searchGET%'");
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
                    <th>#</th>
                    <th>Customer id</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($projects as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['project_id'] . '</td>';
                    echo '<td>' . $item['customer_id'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['deadline'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'">Project info</a></td>';
                    echo '</tr>';
                }

                if($_GET['type'] == 'search') {
                    foreach ($search as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['project_id'] . '</td>';
                        echo '<td>' . $item['customer_id'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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

