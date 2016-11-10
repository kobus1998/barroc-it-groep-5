<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Sales');

$appointmentId = $_GET['appointmentid'];

$stmt = $db->pdo->query("SELECT * FROM `tbl_appointments`
                 WHERE `tbl_appointments`.appointment_id = " . $appointmentId);
$appointmentDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>Quotation Detail</title>
<meta charset="UTF-8">
</head>

<body>
<div class="header">
    <?php
    if($user->username == "Sales") {
        require "../parts/header_sales.php";
    } elseif($user->username == "Admin") {
        require "../parts/header_admin.php";
    }

    ?>
</div>
<div class="main">
    <div class="container">
        <div class="container">
            <?php if($user->username == 'Admin' || $user->username == 'Sales'){ ?>
                <div class="container">
                    <?php echo "<a href='edit_appointment.php?appointmentid=$appointmentId'>Edit this appointment</a>" ?><br>
                </div>
            <?php } ?>
            <h1 style="text-align:center;font-size:6rem">Appointment details</h1>
            <div class="container">
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Appointment day
                    </div>
                    <div class="panel-body">
                        <p><?php echo $appointmentDB[0]['appointment_day'] ?></p>
                    </div>
                </div>
                <div class="panel panel-default col-md-6" style="padding: 0;">
                    <div class="panel-heading">
                        Next action
                    </div>
                    <div class="panel-body">
                        <p> <?php echo $appointmentDB[0]['next_action'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

