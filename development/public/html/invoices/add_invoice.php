<?php
require realpath(__dir__ . '/../parts/header.php');

$user->checkPage('Finance');
$projectId = $_GET['projectid'];
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
		<h1 class="col-md-6 col-md-offset-3">Add invoice</h1>
		<form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\invoiceController.php?projectid=<?= $projectId ?>" method="POST">
			<div class="form-group">

				<label for="invoice_nr">Invoice number</label>
				<input class="form-control" type="number" name="invoice_nr" id="invoice_nr">

			</div>

			<div class="form-group">

				<label for="price">Price</label>
				<input class="form-control" type="text" name="price" id="price">

			</div>

			<div class="form-group">

				<label for="tax">Tax</label>
				<input class="form-control" type="text" name="tax" id="tax">

			</div>


			<input type="submit" class="btn btn-primary pull-right" value="add invoice" name="type" style="margin-bottom:15px">

		</form>
	</div>
</div>
</body>
</html>