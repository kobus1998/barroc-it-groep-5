<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$projectId = $_GET['projectid'];

$stmt =$db->pdo->query("SELECT * FROM `tbl_projects` WHERE project_id = $projectId");
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
        </div>
    </div>
</body>

