<?php
require realpath(__DIR__ . '/parts/header.php');

$db = Database::getInstance();

$customers = $db->pdo->
             query("SELECT * FROM `tbl_customers`")
             ->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
if($user->username == 'Sales') {
    include 'parts/header_sales.php';
    ?>

    <form class="col-md-6 col-md-offset-3" action="" method="post">

        <div class="form-group">
            <label for="searchfield">search</label>
            <input type="text" name="input" id="searchfield" class="form-control">
        </div>

        <input type="submit" name="search" value="Search" class="btn btn-primary">
    </form>

    <div class="searchresults">
        <?php
        include "searchresults.php";
        ?>
    </div>


    <?php
}

if($user->username == 'Finance') {
    include 'parts/header_finance.php';
    ?>
    <!--html-->
    

    <?php
}

if($user->username == 'Admin') {
    include 'parts/header_admin.php';
    ?>
    <!--html-->


    <?php
}

if($user->username == 'Development') {
    include 'parts/header_development.php';
    ?>
    <!--html-->


    <?php
}
