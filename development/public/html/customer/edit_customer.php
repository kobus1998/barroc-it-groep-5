<?php
require '../parts/header.php';
/*
 * $_GET['edit customer'] is id of the selected customer
 *
 */

/*
 * Query
 */
$db = Database::getInstance();
$stmt = $db->pdo->query('SELECT * FROM `tbl_customers` WHERE customer_id = ' . $_GET['editcustomer']);
$stmt->execute();
$stmt->fetchAll(PDO::FETCH_ASSOC);

if($user->username == 'Sales') {

    ?>
    <div class="header">
        <?php require '../parts/header_sales.php'; ?>
    </div>
    <div class="main-content">
        <div class="edit-customer">
            <div class="container">
                <h1 class="text-center">Edit customer</h1>
                <form>
                    <div class="form-group">
                        <label for="edit-invoice-number">Invoice number</label>
                        <input type="text" name="edit-invoice-number" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-offer-status">Offer status</label>
                        <input type="text" name="edit-offer-status" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-potential-customer">Potential customer</label>
                        <input type="text" name="edit-potential-customer" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-appointment-day">Appointment day</label>
                        <input type="text" name="edit-appointment-day" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-last-contact-date">Last contact date</label>
                        <input type="text" name="edit-last-contact-date" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-next-action">Next action</label>
                        <input type="text" name="edit-last-action" id="" class="form-control">
                    </div>



                    <div class="form-group">
                        <label for="edit-company-name">Company name</label>
                        <input type="text" name="edit-company-name" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-adress">Adress</label>
                        <input type="text" name="edit-adress" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-zipcode">Zip-code</label>
                        <input type="text" name="edit-zipcode" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-city">City</label>
                        <input type="text" name="edit-city" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-contact-person">Contact person</label>
                        <input type="text" name="edit-contact-person" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-phone-number">Phone number</label>
                        <input type="text" name="edit-phone-number" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-fax">Fax</label>
                        <input type="text" name="edit-fax" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="text" name="edit-email" id="" class="form-control">
                    </div>

                    <input type="submit" name="type" class="">
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
