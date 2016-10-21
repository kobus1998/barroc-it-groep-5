<?php
require realpath(__dir__ . '/../parts/header.php');

if(isset($_SESSION['username']) && ($_SESSION['username']) != 'Sales'){
    $user->redirectMessage('index.php', 'Not logged in');
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
        include '../parts/header_sales.php';
        ?>
    </div>
    <div class="main-content">
    	<div class="container">
    		<h1 class="col-md-6 col-md-offset-3">Add appointment</h1>
	        <form class="col-md-6 col-md-offset-3" action="">
	        
	        	<div class="form-group">

	        		<label for="company_name">Project</label>
	        		<input class="form-control" type="text" name="company_name" id="company_name">

	        	</div>

	        	<div class="form-group">

	        		<label for="company_name">Date</label>
	        		<input class="form-control" type="text" name="company_name" id="company_name">

	        	</div>

	        	<div class="form-group">

	        		<label for="company_name">Subject</label>
	        		<input class="form-control" type="text" name="company_name" id="company_name">

	        	</div>

	        	<div class="form-group">
	        		<label for="description">description</label>
	        		<textarea class="form-control" name="description" id="description" rows="8" style="resize:none;"></textarea>
	        	</div>

	        	<input type="submit" class="btn btn-primary pull-right" value="Submit" name="add_customer" style="margin-bottom:15px">

	        </form>
	    </div>
    </div>
</body>
</html>