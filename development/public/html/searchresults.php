<?php
require_once realpath(__DIR__ . '/parts/header.php')
?>

<div class="results">
    <div class="container">
        <?php

        $company_name = $output[0]['company_name'];

        for($i = 0, $size = count($output); $i < $size; ++$i) {
            echo $output[$i]['company_name'];
            echo "<br>";
            echo "<br>";
        }

        ?>
    </div>
</div>