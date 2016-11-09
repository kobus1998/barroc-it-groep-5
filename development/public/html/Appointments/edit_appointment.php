<?php
require realpath(__dir__ . '/../parts/header.php');

$customerId = $_GET['customerid'];
$appointmentId = $_GET['appointmentid'];
$customerName = Database::getInstance()->pdo->query("SELECT * FROM `tbl_customers` WHERE customer_id = $customerId")->fetchAll(PDO::FETCH_ASSOC);
$appointments = Database::getInstance()->pdo->query("SELECT * FROM tbl_appointments WHERE customer_id = $customerId")->fetchAll(PDO::FETCH_ASSOC);
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
		<h1 class="col-md-6 col-md-offset-3">Edit appointment</h1>
		<form method="post" class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>/development/app/controller/appointmentController.php?appointmentid=<?= $appointmentId; ?>&customerid=<?= $customerId ?>">

			<p><b>For user </b><?= $customerName[0]['company_name']; ?></p>

			<div class="form-group">
				<label for="edit-appointment-day">Appointment day</label>
				<input class="form-control" type="date" name="edit-appointment-day" id="company_name" value="<?= $appointments[0]['appointment_day'] ?>">

			</div>

			<div class="form-group">
				<label for="edit-next-action">Next action</label>
				<textarea cols="5" rows="5" class="form-control" type="text" name="edit-next-action"><?= $appointments[0]['next_action'] ?></textarea>
			</div>


			<input type="submit" class="btn btn-primary pull-right" value="edit appointment" name="type" style="margin-bottom:15px">

		</form>
	</div>
</div>
</body>
</html>