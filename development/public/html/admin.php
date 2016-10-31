<?php
require realpath(__dir__ . '/parts/header.php');

// Only let people in with the username of the given department
$user->checkPage('Admin');
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
