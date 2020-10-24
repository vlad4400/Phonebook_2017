<?php
  session_start();
  unset($_SESSION['id_user']);
  header('location: /controllers/homepage_controller.php');
?>
