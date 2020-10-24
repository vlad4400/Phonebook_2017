<?php

  require_once(__DIR__ . "/db_model.php");

  class Model extends db{

    function verification_user($login, $password) {

      try {
        $sql = 'SELECT `id_user`
          FROM `users`
          WHERE `login` = ? AND `password` = ?;';

        $id_user = $this->pdo->prepare($sql);
        $id_user->execute(array($login, $password));

      } catch (PDOException $e) {
        exit($e->getMessage());
      }

      return $id_user->fetch()['id_user'];

    }
  }

?>
