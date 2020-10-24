<?php

require_once(__DIR__ . "/db_model.php");


class Model extends db {

  function check_id($id) {
    if(preg_match( '/^\d+$/', $id) and $id <> 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function get_street($id) {

    try {
      $sql = 'SELECT `street`
        FROM `users`
        WHERE `id_user` = ? AND `visible` = 1;';

      $street = $this->pdo->prepare($sql);
      $street->execute(array($id));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return $street->fetch()['street'];
  }

  function get_city($id) {

    try {
      $sql = 'SELECT `city`
        FROM `users`
        WHERE `id_user` = ? AND `visible` = 1;';

      $city = $this->pdo->prepare($sql);
      $city->execute(array($id));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return $city->fetch()['city'];
  }

  function get_country($id) {
    try {
      $sql = 'SELECT `name_country`
        FROM `countries`
        WHERE id = (SELECT `id_country`
        FROM `users`
        WHERE `id_user` = ? AND `visible` = 1);';

      $country = $this->pdo->prepare($sql);
      $country->execute(array($id));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return $country->fetch()['name_country'];
  }

  function get_all_emails($id) {
    try {
      $sql = 'SELECT `email`
        FROM `emails`
        WHERE `id_user` = ? AND `visible` = 1;';

      $emails = $this->pdo->prepare($sql);
      $emails->execute(array($id));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    //var_dump($emails->fetchAll());
    return $emails->fetchAll();
  }

  function get_all_phonenumbers($id) {
    try {
      $sql = 'SELECT `phonenumber`
        FROM `phonenumbers`
        WHERE `id_user` = ? AND `visible` = 1;';

      $phonenumbers = $this->pdo->prepare($sql);
      $phonenumbers->execute(array($id));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    //var_dump($emails->fetchAll());
    return $phonenumbers->fetchAll();
  }
}

?>
