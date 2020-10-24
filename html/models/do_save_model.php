<?php

require_once(__DIR__ . '/../models/db_model.php');

class Model extends db{

  function update_contact($id_user, $first_name, $last_name, $street, $city, $user_visible) {

    try {
      $sql = 'UPDATE `users`
        SET `first_name` = ?,`last_name` = ?,`street` = ?, `city` = ?, `visible` = ?
        WHERE `id_user` = ?;';

      $contact = $this->pdo->prepare($sql);
      $contact->execute(array($first_name, $last_name, $street, $city, $user_visible, $id_user));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return true;
  }

  function update_country($id_user, $country) {

    try {
      $sql = 'UPDATE `users`
        SET `id_country` = (SELECT `id`
        FROM `countries`
        WHERE `name_country` = ?)
        WHERE `id_user` = ?;';

      $contact = $this->pdo->prepare($sql);
      $contact->execute(array($country, $id_user));

    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return true;
  }

  function update_phonenubers($id_user, $phonenumbers, $visibles) {

    try {

      $sql = 'DELETE FROM `phonenumbers`
        WHERE `id_user` = ?;';

      $contact = $this->pdo->prepare($sql);
      $contact->execute(array($id_user));


      $sql = 'INSERT INTO `phonenumbers` (`id_user`, `phonenumber`, `visible`)
      VALUES (?, ?, ?);';

      for ($i = 0; $i < count($phonenumbers); $i++) {
        $contact = $this->pdo->prepare($sql);
        $contact->execute(array($id_user, $phonenumbers[$i], $visibles[$i]));
      }


    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return true;
  }

  function update_emails($id_user, $emails, $visibles) {

    try {

      $sql = 'DELETE FROM `emails`
        WHERE `id_user` = ?;';

      $contact = $this->pdo->prepare($sql);
      $contact->execute(array($id_user));


      $sql = 'INSERT INTO `emails` (`id_user`, `email`, `visible`)
      VALUES (?, ?, ?);';

      for ($i = 0; $i < count($emails); $i++) {
        $contact = $this->pdo->prepare($sql);
        $contact->execute(array($id_user, $emails[$i], $visibles[$i]));
      }


    } catch (PDOException $e) {
      exit($e->getMessage());
    }

    return true;
  }

}

?>
