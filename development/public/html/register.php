<?php require realpath(__DIR__ . '/parts/header.php') ?>

<title>Home</title>
</head>

<body>
    <?php
    require 'parts/header_admin.php';
    ?>
    <div class="main-content">
        <div class="container">
            <h1 class="text-center">Register</h1>
            <form class="col-md-6 col-md-offset-3" method="post" action="<?php echo BASE_URL ?>/development/app/controller/authController.php">
                <div class="form-group">
                    <label for="username">
                        Department
                    </label>
                    <select  name="username" class="form-control">
                        <option></option>
                        <option value="sales">Sales</option>
                        <option value="finance">Finance</option>
                        <option value="development">Development</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password-repeat">
                        Repeat Password
                    </label>
                    <input type="password" name="password-repeat" class="form-control">
                </div>

                <input class="btn-primary" type="submit" name="type" value="register">
                
            </form>
        </div>
    </div>
</body>
</html>
