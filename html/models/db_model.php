<?php
class db {
  protected $pdo;
  private $host = 'localhost';
  private $database = 'phonebook_schema';
  private $username = 'rootv';
  private $password = 'rootv';

  function __construct() {

    try {

      $this->pdo = new PDO("mysql:host=$this->host;
      dbname=$this->database",
      $this->username,
      $this->password);

      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

      exit($e->getMessage());
    }
  }
}
?>
