<?php
require realpath(__dir__ . '/parts/header.php');

// Only let people in with the username of the given department
if(isset($_SESSION['username']) && ($_SESSION['username']) != 'Admin'){
    $user->redirectMessage('index.php', 'Not logged in');
}
?>

<body>

    <div class="header">
    <?php
    include 'parts/header_admin.php';
    ?>
    </div>

    <div class="main-content">

    </div>
</body>
</html>
