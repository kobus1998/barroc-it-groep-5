<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

if($user->username == 'Admin') {
    include realpath(__DIR__. '/parts/header_admin.php');
    $users = $db->pdo->query("SELECT * FROM `tbl_users`")
        ->fetchAll(PDO::FETCH_ASSOC);

    if (!isset($_GET['userid']) || !isset($_GET['username'])) {
        $user->redirect("user_list.php?message=No user selected");
        die;
    }

    ?>
    <?php if(!isset($_GET['messageDanger']) || $_GET['messageDanger'] == '') {
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
    <?php }}

?>

<div class="main-content">
    <div class="container">
        
        <h1 class="text-center">Change password</h1>

        <form class="col-md-6 col-md-offset-3" method="post" action="<?php echo BASE_URL ?>/development/app/controller/authController.php">

            <input type="hidden" name="user_id" value="<?= $_GET['userid'] ?>">
            <input type="hidden" name="username" value="<?= $_GET['username'] ?>">

            <div class="form-group">
                <label for="password">Old password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="new-password">New password</label>
                <input type="password" name="new-password" class="form-control">
            </div>
            <div class="form-group">
                <label for="new-password-repeat">Repeat new Password</label>
                <input type="password" name="new-password-repeat" class="form-control">
            </div>
            <?php if(!isset($_GET['messageDanger']) || $_GET['messageDanger'] == '') {
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
            <input type="submit" name="type" value="change password" class="btn btn-primary">

        </form>

    </div>
</div>
