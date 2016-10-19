<?php
$db = Database::getInstance();



if($user->username == 'Sales') {
    $customers = $db->pdo->
    query("SELECT * FROM `tbl_customers`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <section class="customers">
            <div class="container">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company name</th>
                            <th>Contact person</th>
                            <th>Phone number 1</th>
                            <th>Email</th>
                            <th>Customer info</th>
                            <th>Edit customer</th>

                        </tr>
                    </thead>
                    <tbody>

                            <?php
                            foreach ($customers as $item)
                            {
                                echo '<tr>';
                                echo '<td>' . $item['customer_id'] . '</td>';
                                echo '<td>' . $item['company_name'] . '</td>';
                                echo '<td>' . $item['contact_person'] . '</td>';
                                echo '<td>' . $item['phone_number_1'] . '</td>';
                                echo '<td>' . $item['email'] . '</td>';
                                echo '<td><a href=?customerinfo="' . $item["customer_id"] .'">Customer info</a></td>';
                                echo '<td><a href="?editcustomer=' . $item ["customer_id"] . '">Edit Customer</a></td> ';
                                echo '</tr>';
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </section>


    <?php
}

if($user->username == 'Finance') {
    $customers = $db->pdo->
    query("SELECT * FROM `tbl_customers`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!--html-->
    <section class="customers">
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Company name</th>
                    <th>Contact person</th>
                    <th>Phone number 1</th>
                    <th>Email</th>
                    <th>Customer info</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($customers as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['customer_id'] . '</td>';
                    echo '<td>' . $item['company_name'] . '</td>';
                    echo '<td>' . $item['contact_person'] . '</td>';
                    echo '<td>' . $item['phone_number_1'] . '</td>';
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td><a href=?customerinfo="' . $item["customer_id"] .'">Customer info</a></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>

    <?php
}

if($user->username == 'Admin') {
    $customers = $db->pdo->
    query("SELECT * FROM `tbl_customers`")
        ->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="customers">
        <div class="container">
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Company name</th>
                    <th>Contact person</th>
                    <th>Phone number 1</th>
                    <th>Email</th>
                    <th>Customer info</th>
                    <th>Edit customer</th>

                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($customers as $item)
                {
                    echo '<tr>';
                    echo '<td>' . $item['customer_id'] . '</td>';
                    echo '<td>' . $item['company_name'] . '</td>';
                    echo '<td>' . $item['contact_person'] . '</td>';
                    echo '<td>' . $item['phone_number_1'] . '</td>';
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td><a href=?customerinfo="' . $item["customer_id"] .'">Customer info</a></td>';
                    echo '<td><a href="?editcustomer=' . $item ["customer_id"] . '">Edit Customer</a></td> ';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>


    <?php
}

