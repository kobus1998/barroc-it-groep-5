<?php
require realpath(__dir__ . '/parts/header.php');
?>

<body>
<div class="header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Barroc IT</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customers<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Customer list</a></li>
                            <li><a href="#">Add customer</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quotation<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Quotation list</a></li>
                            <li><a href="#">Add quotation</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Invoice<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Invoice list</a></li>
                            <li><a href="#">Add invoice</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Project<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Project list</a></li>
                            <li><a href="#">Add project</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-right">
                    <li><a href="<?php echo BASE_URL;?>/development/app/controller/authController.php?type=logout"><button class="btn btn-warning">Logout</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="main-content">
    <div class="register">
        <div class="container">
            <h1 class="text-center">Register</h1>

            <form class="col-md-6 col-md-offset-3" action="" method="post">

                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control">
                        <option></option>
                        <option value="1">Sales</option>
                        <option value="2">Finance</option>
                        <option value="3">Development</option>
                        <option value="4">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password-confirm">Password confirm</label>
                    <input type="password" name="password-confirm" id="password-confirm" class="form-control">
                </div>

                <input type="submit" name="type" value="register" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
</body>
</html>
