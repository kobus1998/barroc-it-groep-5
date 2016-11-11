<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $projects = $db->pdo->
    query("
                  SELECT * FROM tbl_projects
        INNER JOIN tbl_customers
          on tbl_projects.customer_id = tbl_customers.customer_id
        WHERE tbl_customers.customer_id
        ORDER BY `project_id` DESC
           ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_projects` 
                      INNER JOIN tbl_customers
                      on tbl_projects.customer_id = tbl_customers.customer_id
                      WHERE `project_name` LIKE :search_query
                      ORDER BY `project_id` DESC";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="projects">
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
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list" value="<?php if(isset($_GET['search-project-list'])){echo $_GET['search-project-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-project-list'] == '') {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="project/edit_project.php?projectid=' . $item['project_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-project-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="project/edit_project.php?projectid=' . $item['project_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
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
    query("        SELECT * FROM tbl_projects
        INNER JOIN tbl_customers
          on tbl_projects.customer_id = tbl_customers.customer_id
        WHERE tbl_customers.customer_id
        ORDER BY `project_id` DESC")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_projects` 
                      INNER JOIN tbl_customers
                      on tbl_projects.customer_id = tbl_customers.customer_id
                      WHERE `project_name` LIKE :search_query";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="projects">
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
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list" value="<?php if(isset($_GET['search-project-list'])){echo $_GET['search-project-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Project name</th>
                    <th>Due date</th>
                    <th>Deadline</th>
                    <th>Project info</th>
                    <th>Add invoice</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-project-list'] == '') {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/add_invoice.php?projectid=' . $item['project_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-project-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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
    query("        SELECT * FROM tbl_projects
        INNER JOIN tbl_customers
          on tbl_projects.customer_id = tbl_customers.customer_id
        WHERE tbl_customers.credit_balance BETWEEN 0 AND tbl_customers.`limit`
        ORDER BY `project_id` DESC")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_projects` 
                      INNER JOIN tbl_customers
                      on tbl_projects.customer_id = tbl_customers.customer_id
                      WHERE `project_name` LIKE :search_query
                      ORDER BY `project_id` DESC";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="projects">
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
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list" value="<?php if(isset($_GET['search-project-list'])){echo $_GET['search-project-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>
                    <th>Add invoice</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-project-list'] == '') {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="invoices/add_invoice.php?projectid=' . $item['project_id'] . '" class="btn btn-success glyphicon glyphicon-plus"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-project-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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
        WHERE tbl_customers.credit_balance BETWEEN 0 AND tbl_customers.`limit`
        ORDER BY `project_id` DESC
    ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-project-list'])) {
        $searchGET = $_GET['search-project-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_projects` 
                      INNER JOIN tbl_customers
                      on tbl_projects.customer_id = tbl_customers.customer_id
                      WHERE `project_name` LIKE :search_query
                      ORDER BY `project_id` DESC";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="projects">
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
            <h2 class="text-center">Project list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search project name
                            <input type="search" name="search-project-list" value="<?php if(isset($_GET['search-project-list'])){echo $_GET['search-project-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Project info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-project-list'] == '') {
                    foreach ($projects as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-project-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['project_name'] . '</td>';
                        echo '<td>' . $item['due_date'] . '</td>';
                        echo '<td>' . $item['deadline'] . '</td>';
                        echo '<td><a href="project/info_project.php?projectid=' . $item["project_id"] . '" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>';
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

