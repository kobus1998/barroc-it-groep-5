<?php
require realpath(__dir__ . '/../parts/header.php');

$user->checkPage('Sales');

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
		}

		?>
    </div>
    <div class="main-content">
    	<div class="container">
			<?php if (isset($_GET['message'])) {
				echo "<h2><span class='label label-danger text-center col-md-6 col-md-offset-3'>". $_GET['message'] ."</span></h2>";
			} ?>
    		<h1 class="col-md-6 col-md-offset-3">Add customer</h1>
	        <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\customerController.php" method="POST">
	        	<div class="form-group">

	        		<label for="company_name">company name</label>
	        		<input class="form-control" type="text" name="company_name" id="company_name">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="address_1">address and housenumber</label>
	        		<input class="form-control" type="text" name="address_1" id="address_1">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="address_2">address and housenumber 2</label>
	        		<input class="form-control" type="text" name="address_2" id="address_2">

	        	</div>
	        	
	        	<div class="form-group">

					<label for="zipcode">zipcode</label>
					<input class="form-control" type="text" name="zipcode" id="zipcode">

				</div>

				<div class="form-group">

					<label for="zipcode_2">zipcode 2</label>
					<input class="form-control" type="text" name="zipcode_2" id="zipcode_2">

				</div>

	        	
	        	<div class="form-group">

	        		<label for="phone_number_1">phone number</label>
	        		<input class="form-control" type="text" name="phone_number_1" id="phone_number_1">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="phone_number_2">phone number 2</label>
	        		<input class="form-control" type="text" name="phone_number_2" id="phone_number_2">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="email">email</label>
	        		<input class="form-control" type="text" name="email" id="email">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="fax">fax</label>
	        		<input class="form-control" type="text" name="fax" id="fax">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="contact_person">contact person</label>
	        		<input class="form-control" type="text" name="contact_person" id="contact_person">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="internal_contact_person">internal contact person</label>
	        		<input class="form-control" type="text" name="internal_contact_person" id="internal_contact_person">

	        	</div>
	        	
	        	<div class="form-group">

	        		<label for="bank_nr">bank number</label>
	        		<input class="form-control" type="text" name="bank_nr" id="bank_nr">

	        	</div>

	        	<input type="submit" class="btn btn-primary pull-right" value="add customer" name="type" style="margin-bottom:15px">

	        </form>
	    </div>
    </div>
</body>
</html>