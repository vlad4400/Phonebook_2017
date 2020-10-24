<?php

include_once(__DIR__ . "/../views/blockcustomer_view.php");
require_once(__DIR__ . "/../models/blockcustomer_model.php");

$user = new Model();
$view = new View();

$id_user = trim($_POST['id']);

//Verification of 'id' received from the client;
$bool_res_check = $user->check_id($id_user);

$bool_res_check?:exit('Error: Attempt to use code injections');

$street = $user->get_street($id_user);
$city = $user->get_city($id_user);
$country = $user->get_country($id_user);
$emails = $user->get_all_emails($id_user);
$phonenumbers = $user->get_all_phonenumbers($id_user);

$view->show_blockcustomer($street, $city, $country, $emails, $phonenumbers);

?>
