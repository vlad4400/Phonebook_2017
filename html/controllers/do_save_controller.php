<?php

session_start();

if (!isset($_SESSION['id_user'])) {

  echo '<script type="text/javascript">
    location="/controllers/homepage_controller.php";
    </script>';
  die();
}


require_once(__DIR__ . '/../models/do_save_model.php');

function show_error() {
  echo '<h3 style="color: red;">Not all data correct</h3>';
  die();
}

function show_successful() {
  echo '<h3 style="color: green;">All data saved</h3>';
  die();
}

function validation_exists($str) {
  if (isset($_POST[$str]) and $_POST[$str] != "") {
    return $_POST[$str];
  } else {
    show_error();
  }
}

//all variable;
$id_user;
$first_name;
$last_name;
$street;
$city;
$country;
$user_visible;
$phone = [];
$phone_check = [];
$email = [];
$email_check = [];

$id_user = $_SESSION['id_user'];
$first_name = validation_exists('first_name');
$last_name = validation_exists('last_name');
$street = validation_exists('street');
$city = validation_exists('city');
$country = validation_exists('country');

if (isset($_POST['user_visible'])) {
  $user_visible = 1;
} else {
  $user_visible = 0;
}

$i = 0;

while (isset($_POST["phone_$i"])) {
  if ($_POST["phone_$i"] <> "") {
    $phone[] = $_POST["phone_$i"];
    if (isset($_POST["phone_check_$i"])) {
      $phone_check[] = 1;
    } else {
      $phone_check[] = 0;
    }
  }
  $i++;
}

$i = 0;

while (isset($_POST["email_$i"])) {
  if ($_POST["email_$i"] <> "") {
    $email[] = $_POST["email_$i"];
    if (isset($_POST["email_check_$i"])) {
      $email_check[] = 1;
    } else {
      $email_check[] = 0;
    }
  }
  $i++;
}

$user = new Model();

if (!$user->update_contact($id_user, $first_name, $last_name, $street, $city, $user_visible)) {
  show_error();
}

if (!$user->update_country($id_user, $country)) {
  show_error();
}

if (!$user->update_phonenubers($id_user, $phone, $phone_check)) {
  show_error();
}

if (!$user->update_emails($id_user, $email, $email_check)) {
  show_error();
}

show_successful();


?>
