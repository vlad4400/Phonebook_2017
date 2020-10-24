<?php

require_once(__DIR__ . "/db_model.php");


class Model extends db {

  function get_list_customers() {

    try {
      $sql = 'SELECT `id_user`, `first_name`, `last_name`
        FROM `users`
        WHERE `visible` = 1;';

      $list_customers = $this->pdo->query($sql);

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return $list_customers->fetchAll();
  }
}

?>
