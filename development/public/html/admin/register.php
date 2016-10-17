<?php require realpath(__DIR__ . '/../parts/header.php') ?>

<title>Home</title>
</head>

<body>
    <div class="header">
    <?php
    // if session role = admin
    // require PUBLIC_PATH . 'html/parts/header_admin.php';
    // else if session role = sales
    // require PUBLIC_PATH . 'html/parts/header_sales.php';

    //etc.


    ?>
    </div>
    <div class="main-content">
        <div class="container">
            <h1>Register</h1>
            <form method="post" action="<?php echo BASE_URL ?>/development/app/controller/authController.php">
                <div class="form-group">
                    <label for="username">
                        Department
                    </label>
                    <select  name="username">
                        <option></option>
                        <option value="1">Sales</option>
                        <option value="2">Finance</option>
                        <option value="3">Development</option>
                        <option value="4">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password-repeat">
                        Repeat Password
                    </label>
                    <input type="password" name="password-repeat">
                </div>

                <input type="submit" name="type" value="register">
            </form>
        </div>
    </div>
</body>
</html>
