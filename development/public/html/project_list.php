<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $projects = $db->pdo->
    query("SELECT * FROM `tbl_projects`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="projects">
        <div class="container">
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
                    echo '<td>' . $item['Project_name'] . '</td>';
                    echo '<td>' . $item['deadline'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'">Project info</a></td>';
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
    $projects = $db->pdo->
    query("SELECT * FROM `tbl_projects`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="projects">
        <div class="container">
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
                    echo '<td>' . $item['Project_name'] . '</td>';
                    echo '<td>' . $item['deadline'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'">Project info</a></td>';
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
    $projects = $db->pdo->
    query("SELECT * 
           from `tbl_projects` 
            ")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="projects">
        <div class="container">
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
                    echo '<td>' . $item['Project_name'] . '</td>';
                    echo '<td>' . $item['deadline'] . '</td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["project_id"] .'">Project info</a></td>';
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

