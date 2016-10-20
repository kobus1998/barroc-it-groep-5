<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();



if($user->username == 'Sales') {
    include realpath(__DIR__. '/parts/header_sales.php');
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
                            <th>Limit</th>
                            <th>Potential customer</th>
                            <th>Credit worthy</th>
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
                                echo '<td>' . $item['limit'] . '</td>';
                                echo '<td>' . $item['potential_customer'] . '</td>';
                                echo '<td>' . $item['credit_worthy'] . '</td>';
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
    include realpath(__DIR__. '/parts/header_finance.php');
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
                    <th>Credit balance</th>
                    <th>Gross revenue</th>
                    <th>Credit worthy</th>
                    <th>Limit</th>
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
                    echo '<td>' . $item['credit_balance'] . '</td>';
                    echo '<td>' . $item['gross_revenue'] . '</td>';
                    echo '<td>' . $item['credit_worthy'] . '</td>';
                    echo '<td>' . $item['limit'] . '</td>';
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
    include realpath(__DIR__. '/parts/header_admin.php');
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

if($user->username == 'Development') {
    include realpath(__DIR__. '/parts/header_development.php');
    $customers = $db->pdo->
    query("SELECT * 
            FROM `tbl_projects`
            INNER JOIN tbl_customers
            ON tbl_customers.customer_id = tbl_projects.customer_id
            WHERE tbl_customers.customer_id
            ")
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
                    <th>Credit balance</th>
                    <th>Credit worthy</th>
                    <th>Email</th>
                    <th>Project name</th>
                    <th>Deadline</th>
                    <th>Customer info</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($customers as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['customer_id'] . '</td>';
                    echo '<td>' . $item['company_name'] . '</td>';
                    echo '<td>' . $item['contact_person'] . '</td>';
                    echo '<td>' . $item['phone_number_1'] . '</td>';
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td>' . $item['project_name'] . '</td>';
                    echo '<td>' . $item['deadline'] . '</td>';
                    echo '<td><a href=?customerinfo="' . $item["customer_id"] . '">Customer info</a></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>

<?php
    }
 ?>

