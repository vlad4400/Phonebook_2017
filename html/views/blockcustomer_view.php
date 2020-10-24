<?php

class View {

  function show_blockcustomer($street, $city, $country, $emails, $phonenumbers) {

    echo $street;
    echo "<p>";
    echo $city;
    echo "<p>";
    echo $country;
    echo "<p>";

    foreach($emails as $email) {
      echo $email['email'] . " | ";
    }

    echo "<p>";

    foreach($phonenumbers as $phonenumber) {
      echo $phonenumber['phonenumber'] . " | ";
    }

  }
}
?>
