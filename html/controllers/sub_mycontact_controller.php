<?php

session_start();

if (!isset($_SESSION['id_user'])) {
  echo '<script type="text/javascript">
    location="/controllers/homepage_controller.php";
    </script>';
  die();
}

require_once(__DIR__ . '/../models/mycontact_model.php');
include_once(__DIR__ . '/../views/mycontact_view.php');

$id_user = $_SESSION['id_user'];

$user = new Model();
$page = new View();

//get: first_name, last_name, street, city, id_country, visible;
$contact = $user->get_contact($id_user);

$country = $user->get_country($contact['id_country']);
$phonenumbers = $user->get_all_phonenumbers($id_user);
$emails = $user->get_all_emails($id_user);
$all_countris = $user->get_all_countris($country);

$page->print_all_data($contact, $country, $phonenumbers, $emails, $all_countris);

?>
