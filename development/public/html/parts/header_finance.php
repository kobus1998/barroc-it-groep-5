<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Barroc IT</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Customer list</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Invoice<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Invoices list</a></li>
                        <li><a href="#">Add invoice</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-right">
                <li><a href="<?php echo BASE_URL;?>/development/app/controller/authController.php?type=logout"><button class="btn btn-warning">Logout</button></a></li>
            </ul>
        </div>
    </div>
</nav>