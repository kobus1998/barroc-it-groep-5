<?php
$db = Database::getInstance();

$customers = $db->pdo->
             query("SELECT * FROM `tbl_customers`")
             ->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->pdo->
query("SELECT * FROM `tbl_customers`");
$stmt->fetchAll(PDO::FETCH_ASSOC);

$colheader = current($stmt);
?>
<?php
if($user->username == 'Sales') {

    ?>
        <section class="customers">
            <div class="container">
                <table class="table ">
                    <thead>
                        <tr>
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
    ?>
    <!--html-->
    <section class="customers">
        <div class="container">
            <table class="table table-striped">
                <tr class="row">
                    <?php
                    foreach ($tableHeader as $item)
                    {
                        echo '<th>' . $item['Field'] . '</th>';
                    }
                    ?>
                    <!--<th>Company name</th>
                    <th>Adress 1</th>
                    <th>Housenumber 1</th>
                    <th>Zip code 1</th>
                    <th>City 1</th>
                    <th>Housenumber 2</th>
                    <th>Zipcode 2</th>
                    <th>City 2</th>
                    <th>Contact person</th>
                    <th>Initials</th>
                    <th>Phone number 1</th>
                    <th>Phone number 2</th>
                    <th>Fax</th>
                    <th>Email</th>
                    <th>Invoicenumber</th>
                    <th>Offer status</th>
                    <th>Potential customer y/n</th>
                    <th>Appointment day</th>
                    <th>Next action</th>-->
                </tr>
            </table>
        </div>
    </section>

    <?php
}

if($user->username == 'Admin') {
    ?>
    <!--html-->


    <?php
}

if($user->username == 'Development') {
    ?>
    <!--html-->


    <?php
}
