<?php
require realpath(__dir__ . '/../parts/header.php');

/*
 * Legt een connectie met de database zodat er klantgegevens kunnen worden weergeven
 * Alleen met de aangegeven customer ID
 *
 * */
$customerId = $_GET['customerid'];
$sql = "SELECT * FROM `tbl_customers` WHERE customer_id = :customerid";

$stmt = $db->pdo->prepare($sql);
$stmt->bindParam(':customerid', $customerId);
$stmt->execute();

$customer = $stmt->fetchAll();

if ($stmt->rowCount() == 0) {
    $user->redirect('customer_list.php?message=No customer selected');
    die;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barroc-IT</title>
</head>
<body>
<div class="header">
    <?php
    if($user->username == "Sales") {
        require "../parts/header_sales.php";
    } elseif($user->username == "Finance") {
        require "../parts/header_finance.php";
    } elseif($user->username == "Admin") {
        require "../parts/header_admin.php";
    } elseif($user->username == "Development") {
        require "../parts/header_development.php";
    }
    ?>
</div>
<div class="main-content">
    <div class="container">
        <?php if($user->username == 'Sales' || $user->username == 'Admin' || $user->username == 'Finance'){ ?>
        <div class="container">
            <?php echo "<a href='edit_customer.php?customerid=$customerId'>Edit this customer</a>" ?>
        </div>
        <?php } ?>
        <h1 style="text-align:center;font-size:6rem">Customer details</h1>

        <div class="container">
            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Company name
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['company_name'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Contact person
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['contact_person'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Initials
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['initials'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Address and housenumber
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['address_1'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Zipcode
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['zipcode'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    City
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['city'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Address and housenumber 2
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['address_2'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Zipcode 2
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['zipcode_2'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    City 2
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['city_2'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Phone number
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['phone_number_1'] ?></p>
                </div>
            </div>


            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Phone number 2
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['phone_number_2'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Email
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['email'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Fax
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['fax'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Potential customer
                </div>
                <div class="panel-body">
                    <p><?php if($customer[0]['potential_customer'] == 1) {
                            echo 'yes';
                        } else {echo 'no'; } ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Bank number
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['bank_nr'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Limit
                </div>
                <div class="panel-body">
                    <p>€ <?php echo $customer[0]['limit'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Credit balance
                </div>
                <div class="panel-body">
                    <p>€ <?php echo $customer[0]['credit_balance'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Credit worthy
                </div>
                <div class="panel-body">
                    <p><?php if($customer[0]['credit_worthy'] == 1 ) {
                            echo 'yes';
                        } else {echo 'no'; }?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Ledger account number
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['ledger_account_number'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Gross revenue
                </div>
                <div class="panel-body">
                    <p>€ <?php echo $customer[0]['gross_revenue'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Sales percentage
                </div>
                <div class="panel-body">
                    <p>€ <?php echo $customer[0]['sales_percentage'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Number of invoices
                </div>
                <div class="panel-body">
                    <p><?php echo $customer[0]['number_of_invoices'] ?></p>
                </div>
            </div>

            <div class="panel panel-default col-md-6" style="padding: 0;">
                <div class="panel-heading">
                    Last contact date
                </div>
                <div class="panel-body">
                    <p class="text-danger"><?php echo $customer[0]['last_contact_date'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php
            $sql = "SELECT * FROM tbl_projects
                LEFT JOIN tbl_customers
                  on tbl_customers.customer_id = tbl_projects.customer_id
                WHERE tbl_customers.customer_id = :customerId";

            $stmt = $db->pdo->prepare($sql);
            $stmt->bindParam(':customerId', $customerId);
            $stmt->execute();
            $projects_customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Project name</th>
                            <th>Deadline</th>
                            <th>Project info</th>
                        </tr>
                    </thead>
                </div>
                <div class="panel-body">
                    <tbody>
                            <?php
                            foreach ($projects_customer as $item):

                            ?>
                            <tr>
                                <td class="col-md-4"><?php echo $item['project_name'] ?></td>
                                <td class="col-md-4"><?php echo $item['deadline'] ?></td>
                                <td class="col-md-4"><a href="../project/info_project.php?projectid=<?=$item['project_id']?>" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php
            $sql = "SELECT * FROM tbl_quotations
                LEFT JOIN tbl_customers
                  on tbl_customers.customer_id = tbl_quotations.customer_id
                WHERE tbl_customers.customer_id = :customerId";

            $stmt = $db->pdo->prepare($sql);
            $stmt->bindParam(':customerId', $customerId);
            $stmt->execute();
            $quotation_customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Quotation Number</th>
                            <th>Quotation date</th>
                            <th>Quotation details</th>
                        </tr>
                        </thead>
                </div>
                <div class="panel-body">
                    <tbody>
                    <?php
                    foreach ($quotation_customer as $item):

                        ?>
                        <tr>
                            <td class="col-md-4"><?php echo $item['quotation_number'] ?></td>
                            <td class="col-md-4"><?php echo $item['quotation_date'] ?></td>
                            <td class="col-md-4"><a href="../quotation/info_quotation.php?quotationid=<?=$item['quotation_id']?>" class="btn btn-primary glyphicon glyphicon-eye-open"></a></td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php
                    $appointments = Database::getInstance()->pdo->query("SELECT * 
                    FROM `tbl_appointments`
                    WHERE customer_id = $customerId order by appointment_id DESC")->fetchAll(PDO::FETCH_ASSOC);

                    ?>
                    <div class="panel panel-default">

                            <div class="panel-heading">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Appointment day</th>
                                            <th>Next action</th>
                                            <th>Edit appointment</th>
                                        </tr>
                                    </thead>
                            </div>
                        <div class="panel-body"></div>
                            <tbody>
                        <?php
                        foreach ($appointments as $item) {
                            echo '<tr>';
                            echo '<td>' . $item['appointment_day'] . '</td>';
                            echo '<td>' . $item['next_action'] . '</td>';
                            echo '<td><a class="btn btn-primary glyphicon glyphicon-book" href="../Appointments/edit_appointment.php?appointmentid=' . $item["appointment_id"] . '&customerid=' . $item["customer_id"] . '"></a></td>';
                            echo '</tr>';
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>