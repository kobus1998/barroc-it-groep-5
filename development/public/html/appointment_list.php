<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
    $appointments = $db->pdo->
    query("
                  SELECT * FROM tbl_appointments
        INNER JOIN tbl_customers
          on tbl_appointments.customer_id = tbl_customers.customer_id
        ORDER BY tbl_appointments.appointment_day DESC
           ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-appointment-list'])) {
        $searchGET = $_GET['search-appointment-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_appointments` 
                      INNER JOIN tbl_customers
                      on tbl_appointments.customer_id = tbl_customers.customer_id
                      WHERE `company_name` LIKE :search_query
                      ORDER BY `appointment_day` DESC";

        $stmt = $db->pdo->prepare($searchSQL);
        $stmt->bindParam(':search_query', $searchQuery);
        $stmt->execute();

        $searchResults = $stmt->fetchAll();
    }
    ?>
    <section class="appointments">
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
            <h2 class="text-center">Appointment list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search company name
                            <input type="search" name="search-appointment-list" value="<?php if(isset($_GET['search-appointment-list'])){echo $_GET['search-appointment-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Appointment day</th>
                    <th>Next action</th>
                    <th>Appointment info</th>
                    <th>Edit appointment</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-appointment-list'] == '') {
                    foreach ($appointments as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['appointment_day'] . '</td>';
                        echo '<td>' . $item['next_action'] . '</td>';
                        echo '<td><a href="appointment/info_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="appointment/edit_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-appointment-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['appointment_day'] . '</td>';
                        echo '<td>' . $item['next_action'] . '</td>';
                        echo '<td><a href="appointment/info_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="appointment/edit_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
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
    $appointments = $db->pdo->
    query("
                  SELECT * FROM tbl_appointments
        INNER JOIN tbl_customers
          on tbl_appointments.customer_id = tbl_customers.customer_id
        ORDER BY tbl_appointments.appointment_day DESC
           ")
        ->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['search-appointment-list'])) {
        $searchGET = $_GET['search-appointment-list'];
        $searchQuery = preg_replace("#[^0-9a-z]#i","",$searchGET);
        $searchQuery = '%'.$searchQuery.'%';

        $searchSQL = "SELECT * FROM `tbl_appointments` 
                      INNER JOIN tbl_customers
                      on tbl_appointments.customer_id = tbl_customers.customer_id
                      WHERE `company_name` LIKE :search_query
                      ORDER BY `appointment_day` DESC";

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
            <h2 class="text-center">Appointment list</h2>
            <div class="search-project col-md-5 col-md-offset-8">
                <form method="get" action="">
                    <div class="form-group row">
                        <label>Search appointment name
                            <input type="search" name="search-appointment-list" value="<?php if(isset($_GET['search-appointment-list'])){echo $_GET['search-appointment-list'];} ?>">
                        </label>
                        <button class="btn btn-warning glyphicon glyphicon-search" type="submit" name="type" value="search"></button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Appointment day</th>
                    <th>Next action</th>
                    <th>Appointment info</th>
                    <th>Edit appointment</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!isset($_GET['type']) || $_GET['search-appointment-list'] == '') {
                    foreach ($appointments as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['appointment_day'] . '</td>';
                        echo '<td>' . $item['next_action'] . '</td>';
                        echo '<td><a href="appointment/info_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="appointment/edit_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                        echo '</tr>';
                    }
                }

                if(isset($_GET['type']) && $_GET['type'] == 'search' && $_GET['search-appointment-list'] != '') {
                    foreach ($searchResults as $item)
                    {
                        echo '<tr>';
                        echo '<td>' . $item['company_name'] . '</td>';
                        echo '<td>' . $item['appointment_day'] . '</td>';
                        echo '<td>' . $item['next_action'] . '</td>';
                        echo '<td><a href="appointment/info_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-info glyphicon glyphicon-eye-open"></a></td>';
                        echo '<td><a href="appointment/edit_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item['customer_id'] . '" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
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

