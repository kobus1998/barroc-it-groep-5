<?php
require realpath(__dir__ . '/../parts/header.php');

if(isset($_SESSION['username']) && ($_SESSION['username']) != 'Sales'){
    $user->redirectMessage('index.php', 'Not logged in');
}

//php
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
        <?php if (isset($_GET['message'])) {
            echo "<h2><span class='label label-danger text-center col-md-6 col-md-offset-3'>". $_GET['message'] ."</span></h2>";
        } ?>
        <h1 class="col-md-6 col-md-offset-3">Add project</h1>

        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\customerController.php" method="POST">

            <div class="form-group">

                <label for="project_name">Project name</label>
                <input class="form-control" type="text" name="project_name" id="project_name">

            </div>

            <div class="form-group">

                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="6" style="resize:vertical"></textarea>

            </div>

            <div class="form-group">

                <label for="hardware&software">Used hardware and software</label>
                <textarea class="form-control" name="hardware&software" id="hardware&software" cols="30" rows="6" placeholder="Example: hardware1, hardware2, software1" style="resize:vertical"></textarea>

            </div>

            <div class="form-group">

                <label for="maintenance_contract">Active maintenance contract</label>
                <input class="form-control" type="checkbox" name="maintenance_contract" id="maintenance_contract">

            </div>

            <div class="form-group">

                <p style="font-weight:bold">Deadline</p>
                <input style="width:33%" class="form-control col-md-2" type="text" placeholder="dd" name="day" id="deadline">
                <input style="width:33%" class="form-control col-md-2" type="text" placeholder="mm" name="month" id="deadline">
                <input style="width:33%" class="form-control" type="text" placeholder="yyyy" name="year" id="deadline">

            </div>

            <input type="submit" class="btn btn-primary pull-right" value="add customer" name="type" style="margin-bottom:15px">

        </form>
    </div>
</div>
</body>
</html>