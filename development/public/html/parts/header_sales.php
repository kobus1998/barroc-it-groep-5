<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?php echo BASE_URL ?>/development/public/html/customer_list.php" class="navbar-brand" style="text-shadow: 1px 1px 1px black; color: gray;">Barroc IT / <span style="font-size: 12px;"><?= $user->username; ?></span></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customers<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL ?>/development/public/html/customer_list.php">Customer list</a></li>
                        <li><a href="<?php echo BASE_URL ?>/development/public/html/customer/add_customer.php">Add customer</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quotations<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL ?>/development/public/html/quotation_list.php">Quotation list</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL ?>/development/public/html/project_list.php">Project list</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Appointments<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL ?>/development/public/html/appointment_list.php">Appointment list</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-right">
                <li><a href="<?php echo BASE_URL;?>/development/app/controller/authController.php?type=logout"><button class="btn btn-warning">Logout</button></a></li>
            </ul>
        </div>
    </div>
</nav>

