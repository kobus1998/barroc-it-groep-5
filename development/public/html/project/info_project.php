<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$projectId = $_GET['projectid'];

$sql = "SELECT * FROM `tbl_projects` WHERE project_id = :projectid";

$stmt = $db->pdo->prepare($sql);
$stmt->bindParam(':projectid', $projectId);
$stmt->execute();

$projectDB = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<title>Project details</title>
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
    <div class="main">
        <div class="container">
        <div class="container">
            <?php if($user->username == 'Admin' || $user->username == 'Sales'){ ?>
                <div class="container">
                    <?php echo "<a href='edit_project.php?projectid=$projectId'>Edit this project</a>" ?><br>
                </div>
            <?php } ?>
        </div>
            <h1 style="text-align:center;font-size:6rem">Project details</h1>
            <div class="">
                <div class="container">
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Project name
                        </div>
                        <div class="panel-body">
                            <p><?php echo $projectDB[0]['project_name'] ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Deadline
                        </div>
                        <div class="panel-body">
                            <p><?php echo $projectDB[0]['deadline'] ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Hardware & Software
                        </div>
                        <div class="panel-body">
                            <p><?php echo $projectDB[0]['hardwaresoftware'] ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Maintenance contract
                        </div>
                        <div class="panel-body">
                            <p><?php if($projectDB[0]['maintenance_contract'] == 1) {
                                    echo 'yes';
                                } else {echo 'no'; } ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default col-md-6" style="padding: 0;">
                        <div class="panel-heading">
                            Project description
                        </div>
                        <div class="panel-body">
                            <p> <?php echo $projectDB[0]['description'] ?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php
                    $appointments = ("SELECT * 
                                      FROM `tbl_invoices`
                                      WHERE project_id = :projectid order by invoice_id DESC");

                    $stmtAppointment = $db->pdo->prepare($appointments);
                    $stmtAppointment->bindParam(':projectid', $projectId);
                    $stmtAppointment->execute();

                    $appointments = $stmtAppointment->fetchAll(PDO::FETCH_ASSOC);

                    ?>
                    <div class="panel panel-default">


                        <div class="panel-heading">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Invoice number</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Edit invoice</th>
                                </tr>
                                </thead>
                        </div>
                        <div class="panel-body"></div>
                        <tbody>
                        <?php
                        foreach ($appointments as $item) {
                            echo '<tr>';
                            echo '<td>' . $item['invoice_nr'] . '</td>';
                            echo '<td>' . $item['price'] . '</td>';
                            echo '<td>' . $item['total'] . '</td>';
                            if ($item['paid'] == 0) {
                                echo '<td>No</td>';
                            } else if ($item['paid'] == 1) {
                                echo '<td>Yes</td>';
                            }

                            echo '<td><a class="btn btn-primary glyphicon glyphicon-book" href="../invoices/edit_invoice.php?invoiceid=' . $item["invoice_id"] . '"></a></td>';
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
</body>

