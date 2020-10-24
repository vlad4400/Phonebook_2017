<?php

require_once(__DIR__ . '/../models/do_login_model.php');

$errors = [];
$login = trim($_POST['login']);
$password = trim($_POST['password']);


if (!isset($login) or $login == NULL) {
  $errors[] = 'Field "USERNAME" is empty';
}

if (!isset($password) or $password == NULL) {
  $errors[] = 'Field "PASSWORD" is empty';
}

//injection test
if ($errors == NULL) {

  $forbidden_characters = '.?\\;\'"` =+-*&$@!()%^#[]{}<>,/';

  $login_copy = $login;

  for ($i = 0; $i < strlen($forbidden_characters); $i++) {
    $login_copy = str_replace($forbidden_characters[$i], '', $login_copy);
  }

  $password_copy = $password;

  for ($i = 0; $i < strlen($forbidden_characters); $i++) {
    $password_copy = str_replace($forbidden_characters[$i], '', $password_copy);
  }

  if ($login !== $login_copy or $password !== $password_copy) {
    $errors[] = 'Error: Attempt to use code injections';
  }
}

//check login and password in database
if ($errors == NULL) {

  $user = new Model();

  $id_user = $user->verification_user($login, $password);

  if (!isset($id_user)) {
    $errors[] = 'Login or password are incorrect';
  }
}

session_start();

if ($errors == NULL) {
  $_SESSION['id_user'] = $id_user;

  echo 'Waiting...';
  //echo '<meta http-equiv="refresh" content="2; /controllers/homepage2_controller.php">';

  echo '<script type="text/javascript">
    location="/controllers/homepage2_controller.php";
    </script>';
  //header('location: /controllers/homepage2_controller.php');

} else {
  unset($_SESSION['id_user']);

  ?>

  <div id="form">
    <form>
      <div class="input">
        USARNAME <input type="text" name="login"
          value="<?=!isset($login)?:$login;?>">
      </div>
      <div class="input">
        PASSWORD <input type="text" name="password"
        value="<?=!isset($password)?:$password;?>">
      </div>
      <div class="submit">
        <input type="submit" value="LOGIN">
      </div>
    </form>
  </div>
  <div id="field_errors">

  <?php

  foreach($errors as $err) {
    echo '<p>' . $err . '<p>';
  }

  ?>

  </div>
  <link rel="stylesheet" href="/views/css/login_css.css">
  <script src="/views/js/login_js.js"></script>
  <style type="text/css">
    #field_errors {
      color: rgb(150, 0, 0);
      display: inline-block;
      margin-top: 100px;
    }
  </style>

  <?php

}

?>
