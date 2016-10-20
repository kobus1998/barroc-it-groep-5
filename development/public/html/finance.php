<?php
require realpath(__dir__ . '/parts/header.php');

if(isset($_SESSION['username']) && ($_SESSION['username']) != 'Finance'){
    $user->redirectMessage('index.php', 'Not logged in');
}
?>

<body>
    <div class="header">
        <?php 
        include 'parts/header_finance.php';
        ?>
    </div>
    <div class="main-content">
    </div>
</body>
</html>
