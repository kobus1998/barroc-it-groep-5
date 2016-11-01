<?php
require_once realpath(__DIR__ . '/../parts/header.php');

$user->checkPage('Sales');
?>
<title>Add quotation</title>
</head>

<div class="header">
    <?php require realpath(__DIR__ . '/../parts/header_sales.php'); ?>
</div>

<div class="main-content">
    <div class="container">
        <h1 class="col-md-6 col-md-offset-3">Add quotation</h1>
        <form action="" method="post">
            <div class="form-group">
                <label>
                    Customer
                    <input type="button">
                </label>
            </div>
        </form>
    </div>
</div>
