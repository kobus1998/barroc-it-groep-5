<?php
require '../parts/header.php';
?>



<?php
/*
 * $_GET['edit customer'] is id of the selected customer
 *
 */
$customerID = $_GET['editcustomer'];
/*
 * Query
 */
$db = Database::getInstance();
/*$sql ="SELECT `tbl_projects`.* , `tbl_customers`.*, `tbl_invoices`.* , `tbl_appointments`.*

                          FROM `tbl_projects`
                          
                          INNER JOIN `tbl_customers`
                              on `tbl_projects`.`project_id` = `tbl_customers`.`project_id`
                              
                          INNER JOIN `tbl_invoices`
                              on `tbl_invoices`.`project_id` = `tbl_projects`.`project_id`
                              
                          INNER JOIN `tbl_appointments`
                              on `tbl_appointments`.`project_id` = `tbl_projects`.`project_id`
                              
                          WHERE `tbl_customers`.`customer_id` = $customerID";*/

$sql = "SELECT `tbl_projects`.* , `tbl_customers`.*, `tbl_invoices`.* , `tbl_appointments`.* 
        FROM `tbl_projects`, `tbl_appointments`, `tbl_customers`, `tbl_invoices`
        where `tbl_customers`.customer_id = $customerID AND `tbl_projects`.project_id = $customerID";
$stmt = $db->pdo->prepare($sql);
$stmt->execute();
$sales = $stmt->fetchALL(PDO::FETCH_ASSOC);
if($user->username == 'Sales') {
    foreach ($sales as $item):
    ?>

    <script>

        $(document).ready(function(){
                $('#potential-custom-check').prop('checked')
                });
    </script>

    <div class="header">
        <?php require '../parts/header_sales.php'; ?>
    </div>
    <div class="main-content">
        <div class="edit-customer">
            <div class="container">
                <h1 class="text-center">Edit customer</h1>
                <form class="col-md-6 col-md-offset-3" method="post" action="">

                    <div class="form-group">

                        <label for="edit-company-name">Company name</label>
                        <input type="text" name="edit-company-name" value="<?php echo $item['company_name'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-contact-person">Contact person</label>
                        <input type="text" name="edit-contact-person" value="<?php echo $item['contact_person'] ?>" class="form-control">

                    </div>
                    <br>
                    <div class="form-group">

                        <label for="edit-adress">Adress</label>
                        <input type="text" name="edit-adress" value="<?php echo $item['address_1'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-zipcode">Zip-code</label>
                        <input type="text" name="edit-zipcode" value="<?php echo $item['zipcode'] ?>" class="form-control">

                    </div>

                    <br>
                    <div class="form-group">
                        <label for="edit-phone-number">Phone number</label>
                        <input type="tel" name="edit-phone-number" value="<?php echo $item['phone_number_1'] ?>" class="form-control">
                    </div>

                    <div class="form-group">

                        <label for="edit-fax">Fax</label>
                        <input type="text" name="edit-fax" value="<?php echo $item['fax'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-email">Email</label>
                        <input type="email" name="edit-email" value="<?php echo $item['email'] ?>" class="form-control">

                    </div>
                    <br>
                    <div class="form-group">

                        <label for="edit-invoice-number">Invoice number</label>
                        <input type="text" name="edit-invoice-number" value="<?php echo $item['invoice_nr'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-offer-status">Offer status</label>
                        <input type="text" name="edit-offer-status" value="" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-potential-customer">Potential customer</label>
                        <input type="checkbox" id="potential-custom-check" name="edit-potential-customer" value="<?php echo $item['potential_customer'] ?>" class="form-control">

                    </div>
                    <br>
                    <div class="form-group">

                        <label for="edit-appointment-day">Appointment day</label>
                        <input type="date" name="edit-appointment-day" value="<?php echo $item['appointment_day'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-last-contact-date">Last contact date</label>
                        <input type="date" name="edit-last-contact-date" value="<?php echo $item['last_contact_date'] ?>" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="edit-next-action">Next action</label>
                        <textarea name="edit-last-action" class="form-control"><?php echo $item['next_action'] ?></textarea>

                    </div>
                    <input type="submit" name="type" class="btn btn-primary">
                    <br>
                    <br>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>


    </div>
    <?php
}
if($user->username == 'Finance') {
    ?>

    <?php
}
if($user->username == 'Admin') {
    ?>

    <?php
}
