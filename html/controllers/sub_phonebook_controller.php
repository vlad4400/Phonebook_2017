<?php

include_once(__DIR__ . "/../views/phonebook_view.php");
require_once(__DIR__ . "/../models/phonebook_model.php");

$model = new Model();
$view = new View();

$list_customers = $model->get_list_customers();

$view->print_list_customers($list_customers);

?>
