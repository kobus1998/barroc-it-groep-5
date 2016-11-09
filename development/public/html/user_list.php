<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);


if($user->username == 'Admin') {
    include realpath(__DIR__. '/parts/header_admin.php');
    $users = $db->pdo->query("SELECT * FROM `tbl_users`")
        ->fetchAll(PDO::FETCH_ASSOC);

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
            <?php }} ?>

<div class="main-content">
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>User</th>
                <th>Change password</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($users)) {
                foreach ($users as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['username'] . '</td>';
                    echo '<td><a href="change_password.php?userid='.$item["user_id"].'&username='.$item["username"].'" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>';
                    echo '</tr>';
                }
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
