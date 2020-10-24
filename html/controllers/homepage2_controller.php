<?php

session_start();

if (!isset($_SESSION['id_user'])) {
  header('location: /controllers/homepage_controller.php');
  die();
}

include_once(__DIR__ . "/../views/homepage2_view.php");

$page = new View();

$page->show_page();

?>
