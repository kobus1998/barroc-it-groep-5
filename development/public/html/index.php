<?php
require realpath(__dir__ . '/parts/header.php');
?>

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
        <div class="login">
            <div class="container">
                <h1 class="text-center">Login</h1>

                <form action="<?php echo BASE_URL ?>/development/app/controller/authController.php" method="post">

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
                        <input type="password" name="login" id="password" class="form-control">
                    </div>

                    <input type="submit" name="type" value="login">
                </form>
            </div>
        </div>
    </div>

</body>
</html>
