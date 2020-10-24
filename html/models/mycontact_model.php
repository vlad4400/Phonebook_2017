<?php

require_once(__DIR__ . "/db_model.php");

class Model extends db{

  function get_contact($id_user) {

    try {
      $sql = 'SELECT `first_name`, `last_name`, `street`, `city`, `id_country`, `visible`
        FROM `users`
        WHERE `id_user` = ?;';

      $contact = $this->pdo->prepare($sql);
      $contact->execute(array($id_user));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return $contact->fetch();
  }

  function get_country($id_country) {

    try {
      $sql = 'SELECT `name_country`
        FROM `countries`
        WHERE `id` = ?;';

      $country = $this->pdo->prepare($sql);
      $country->execute(array($id_country));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return $country->fetch()['name_country'];
  }

  function get_all_phonenumbers($id_user) {

    try {
      $sql = 'SELECT `phonenumber`, `visible`
        FROM `phonenumbers`
        WHERE `id_user` = ?;';

      $phonenumbers = $this->pdo->prepare($sql);
      $phonenumbers->execute(array($id_user));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return $phonenumbers->fetchAll();
  }

  function get_all_emails($id) {
    try {
      $sql = 'SELECT `email`, `visible`
        FROM `emails`
        WHERE `id_user` = ?;';

      $emails = $this->pdo->prepare($sql);
      $emails->execute(array($id));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    return $emails->fetchAll();
  }

  function get_all_countris($country) {
    try {
      $sql = 'SELECT `name_country`
        FROM `countries`
        WHERE `name_country` <> ?;';

        $all_countris = $this->pdo->prepare($sql);
        $all_countris->execute(array($country));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    return $all_countris->fetchAll();
  }
}


?>
