<?php
/**
 * This page give the ability to add invoices
 *
 */
require realpath(__dir__ . '/parts/header.php');

if(isset($_SESSION['username']) && ($_SESSION['username']) != 'Finance'){
    $user->redirectMessage('index.php', 'Not logged in');
}
?>

<body>
<div class="header">
    <?php
    include 'parts/header_finance.php';
    ?>
</div>
<div class="main-content">

	<!-- The next code will give a form for adding invoices -->
	<div class="container">
		<section class="col-md-12">
			<h2 class="col-md-offset-3">Add some invoices</h2>
			<br>
		    <form action="<?php BASE_URL ?>/app/controller/invoiceController.php" method="POST" class="col-md-4 col-md-offset-3">
		    	<h4>Document details:</h4>
				<div class="form-group">
		    		<label for="date">Date:</label>
		    		<input type="text" name="date" id="date" class="pull-right">
		    	</div>
		    	<div class="form-group">
		    		<label for="invoice-number">Invoice number:</label>
		    		<input type="text" name="invoice-number" id="invoice-number" class="pull-right">
		    	</div>
				<br>

		    	<h4>Your company contact details:</h4>
		    	<div class="form-group">
		    		<label for="address">address:</label>
		    		<input type="text" name="address" id="address" class="pull-right">
		    	</div>
		    	<div class="form-group">
		    		<label for="phonenumber">Phonenumber:</label>
		    		<input type="text" name="phonenumber" id="phonenumber" class="pull-right">
		    	</div>
		    	<div class="form-group">
		    		<label for="email">email:</label>
		    		<input type="email" name="email" id="email" class="pull-right">
		    	</div>
		    	<div class="form-group">
		    		<label for="kvk-number">KvK-number:</label>
		    		<input type="text" name="kvk-number" id="kvk-number" class="pull-right">
		    	</div>
		    	<br>
		    	<h4>Client details:</h4>
		    	<div class="form-group">
		    		<label for="response time">response time:</label>
		    		<input type="text" name="response time" id="response time" class="pull-right">
		    	</div>
		    	<input type="submit" name="type" value="Add invoice" class="btn btn-success">
		    </form>
		</section>
	</div>
    
</div>
</body>
</html>