<?php
require realpath(__dir__ . '/parts/header.php');
$users = Database::getInstance()->pdo->
query("SELECT * FROM `tbl_users`")
    ->fetchAll(PDO::FETCH_ASSOC);

if($user->getLoggedIn() == true) {
    $user->redirect('../../app/router.php');
}

?>

<title>Home</title>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                       <p>Barroc IT</p>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="login">
            <div class="container">
                <h1 class="text-center">Login</h1>

                <form class="col-md-6 col-md-offset-3" action="<?php echo BASE_URL ?>/development/app/controller/authController.php" method="post">

                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="username" id="department" class="form-control">
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
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <?php
                    if(!isset($_GET['messageDanger']) || $_GET['messageDanger'] == '') {
                        } else { ?>
                            <P class="alert-danger pull-right" style="padding: 7px!important;">
                                <?= $_GET['messageDanger'] ?>
                            </P>
                        <?php }

                        if(!isset($_GET['messagePrimary']) || $_GET['messagePrimary'] == '') {
                        } else { ?>
                            <P class="alert-primary pull-right" style="padding: 7px!important;">
                                <?= $_GET['messagePrimary'] ?>
                            </p>
                        <?php }

                        if(!isset($_GET['messageSuccess']) || $_GET['messageSuccess'] == '') {
                        } else { ?>
                            <P class="alert-success pull-right" style="padding: 7px!important;">
                                <?= $_GET['messageSuccess'] ?>
                            </P>
                        <?php } ?>


                    <input type="submit" name="type" value="login" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

</body>
</html>
