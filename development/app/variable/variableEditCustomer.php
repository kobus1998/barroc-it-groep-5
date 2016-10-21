<?php

//url customer id
$customerID = $_GET['customerid'];

//tbl customer
if(isset($_POST['edit-company-name'])) {
    $editCompanyName = $_POST['edit-company-name'];
}

if(isset($_POST['edit-contact-person'])) {
    $editContactPerson = $_POST['edit-contact-person'];
}

if(isset($_POST['edit-adress'])) {
    $editAdress = $_POST['edit-adress'];
}

if(isset($_POST['edit-zipcode'])) {
    $editZipcode = $_POST['edit-zipcode'];
}

if(isset($_POST['edit-phone-number'])) {
    $editPhone = $_POST['edit-phone-number'];
}

if(isset($_POST['edit-fax'])) {
    $editFax = $_POST['edit-fax'];
}

if(isset($_POST['edit-email'])) {
    $editEmail = $_POST['edit-email'];
}

if(isset($_POST['edit-potential-customer'])) {
    $editPotentialCustomer = $_POST['edit-potential-customer'];
}

if(isset($_POST['edit-last-contact-date'])) {
    $editLastContact = $_POST['edit-last-contact-date'];
}


//tbl invoices
if(isset($_POST['edit-invoice-number'])) {
    $editInvoiceNumber = $_POST['edit-invoice-number'];
}

if(isset($_POST['edit-offer-status'])) {
    $editOfferStatus = $_POST['edit-offer-status'];
}


//tbl appointments
if(isset($_POST['edit-appointment-day'])) {
    $editAppointmentDay = $_POST['edit-appointment-day'];
}

if(isset($_POST['edit-next-action'])) {
    $editNextAction = $_POST['edit-next-action'];
}