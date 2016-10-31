<?php
require realpath(__DIR__. '/parts/header.php');
$db = Database::getInstance();

$user->checkPage($user->username);

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
                                echo '<td><a href=customer/info_customer.php?customerid="' . $item["customer_id"] .'">Customer info</a></td>';
                                echo '<td><a href=customer/edit_customer.php?customerid="' . $item["customer_id"] .'">Edit customer</a></td>';
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
                    <th>Email</th>
                    <th>Credit balance</th>
                    <th>Gross revenue</th>
                    <th>Credit worthy</th>
                    <th>Limit</th>
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
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td>' . $item['credit_balance'] . '</td>';
                    echo '<td>' . $item['gross_revenue'] . '</td>';
                    echo '<td>' . $item['credit_worthy'] . '</td>';
                    echo '<td>' . $item['limit'] . '</td>';
                    echo '<td><a href=customer/info_customer.php?customerid="' . $item["customer_id"] .'">Customer info</a></td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["customer_id"] .'">Edit customer</a></td>';
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
                    echo '<td><a href=customer/info_customer.php?customerid="' . $item["customer_id"] .'">Customer info</a></td>';
                    echo '<td><a href=customer/edit_customer.php?customerid="' . $item["customer_id"] .'">Edit customer</a></td>';
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
           from tbl_customers 
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
                    <th>Credit balance</th>
                    <th>Credit worthy</th>
                    <th>Email</th>
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
                    echo '<td>' . $item['credit_balance'] . '</td>';
                    echo '<td>' . $item['credit_worthy'] . '</td>';
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td><a href=customer/info_customer.php?customerid="' . $item["customer_id"] .'">Customer info</a></td>';
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

