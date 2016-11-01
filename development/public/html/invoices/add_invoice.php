<?php
require realpath(__dir__ . '/../parts/header.php');

$user->checkPage('Finance');
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
	include '../parts/header_finance.php';
	?>
</div>
<div class="main-content">
	<div class="container">
		<?php if (isset($_GET['message'])) {
			echo "<h2><span class='label label-danger text-center col-md-6 col-md-offset-3'>". $_GET['message'] ."</span></h2>";
		} ?>
		<h1 class="col-md-6 col-md-offset-3">Add invoice</h1>
		<form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>\development\app\controller\Controller.php" method="POST">
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

			<div class="form-group">

				<label for="total">Total</label>
				<input class="form-control" type="text" name="total" id="total">

			</div>

			<div class="form-group">

				<label for="paid">Paid</label>
				<input class="form-control checkbox" type="checkbox" name="paid" id="paid">

			</div>

			<input type="submit" class="btn btn-primary pull-right" value="add customer" name="type" style="margin-bottom:15px">

		</form>
	</div>
</div>
</body>
</html>