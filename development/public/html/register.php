<?php require realpath(__DIR__ . '/parts/header.php');

$users = Database::getInstance()->pdo->
query("SELECT * FROM `tbl_users`")
    ->fetchAll(PDO::FETCH_ASSOC);
?>

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
                        <?php

                        foreach ($users as $items)
                        {
                            echo '<option value="' . $items["username"] .'">';
                            echo $items['username'];
                            echo "</option>";

                        }

                        ?>
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
                <p class="alert-danger pull-right" style="padding: 7px!important;"><?php if(isset($_GET['message'])) {echo $_GET['message']; } ?></p>
                <input type="submit" name="type" value="login" class="btn btn-primary">
                
            </form>
        </div>
    </div>
</body>
</html>
