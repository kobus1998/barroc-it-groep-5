<?php
require realpath(__dir__ . '/../parts/header.php');

$user->checkPage('Sales');

if(isset($_SESSION['username']) && ($_SESSION['username']) != 'Sales'){
    $user->redirectMessage('index.php', 'Not logged in');
}

if (!isset($_GET['projectid'])) {
    $user->redirect('project_list.php?message=No project selected');
    die;
}

$project = new Projects();

$project->getProjects($_GET['projectid']);
$projectData = $GLOBALS['projectData'][0];
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
    include '../parts/header_sales.php';
    ?>
</div>
<div class="main-content">
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
        
        <h1 class="col-md-6 col-md-offset-3">Edit project</h1>
        <h2 class="col-md-6 col-md-offset-3">Customer: <?php echo $projectData['company_name']; ?></h2>

        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\projectController.php" method="POST">

            <input type="hidden" name="project_id" value="<?php echo $projectData['project_id']; ?>">

            <div class="form-group">

                <label for="project_name">Project name</label>
                <input class="form-control" type="text" name="project_name" id="project_name" value="<?php echo $projectData['project_name']; ?>">

            </div>

            <div class="form-group">

                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="6" style="resize:vertical"><?php echo $projectData['description']; ?></textarea>

            </div>

            <div class="form-group">

                <label for="hardwaresoftware">Used hardware and software</label>
                <textarea class="form-control" name="hardwaresoftware" id="hardwaresoftware" cols="30" rows="6" placeholder="Example: hardware1, hardware2, software1" style="resize:vertical"><?php echo $projectData['hardwaresoftware']; ?></textarea>

            </div>

            <div class="form-group">

                <p style="font-weight:bold">Active maintenance contract</p>
                <select class="form-control" name="maintenance_contract" id="maintenance_contract"><?php
                    if ($projectData['maintenance_contract'] == 0) { ?>
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                    <?php } else if ($projectData['maintenance_contract'] == 1) { ?>
                        <option selected value="1">Yes</option>
                        <option value="0">No</option>
                    <?php } else { ?>
                        <option selected disabled>Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    <?php } ?>
                </select>

            </div>

            <div class="form-group">

                <p style="font-weight:bold">Deadline</p>
                <p>Original deadline: <?php echo $projectData['deadline']; ?></p>

                <input style="width:33%" class="form-control col-md-2" type="text" placeholder="yyyy" name="year" id="deadline">
                <input style="width:33%" class="form-control col-md-2" type="text" placeholder="mm" name="month" id="deadline">
                <input style="width:33%" class="form-control" type="text" placeholder="dd" name="day" id="deadline">

            </div>

            <input type="submit" class="btn btn-primary pull-right" value="edit project" name="type" style="margin-bottom:15px">

        </form>
    </div>
</div>
</body>
</html>