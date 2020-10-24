<?php

class View {

  function print_all_data($contact, $country, $phonenumbers, $emails, $all_countris) {

    ?>
    <form>
      <div class="column">
        <div class="mini_head">CONTACT</div>
        Fist Name *
        <input name="first_name" size="15" type="text" value="<?=$contact['first_name']?>">
        <p>
        Last Name *
        <input name="last_name" size="15" type="text" value="<?=$contact['last_name']?>">
        <p>
        Street *
        <input name="street" size="15" type="text" value="<?=$contact['street']?>">
        <p>
        City *<br/>
        <input name="city" size="15" type="text" value="<?=$contact['city']?>">
        <p>
        Country *<br/>
        <select name="country">
          <?php
          echo "<option>$country</option>";
          foreach ($all_countris as $count) {
            echo '<option>' . $count['name_country'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="column">
        <div id="id_phones">
          <div class="mini_head">PHONE NUMBERS</div>
          <?php
          $i = 0;
          foreach ($phonenumbers as $numb) { ?>
            <p class="class_phonenumber">
              <input name="phone_check_<?=$i?>" type="checkbox" <?=!$numb['visible']?:'checked';?>>Publish field</input>
              <input name="phone_<?=$i++?>" size="15" type="text" value="<?=$numb['phonenumber']?>">
            </p>
          <?php
          }
          ?>
        </div>

        <input type="button" value="Add number" id="add_phone_number">
      </div>

      <div class="column">
        <div id="id_emails">
          <div class="mini_head">EMAILS</div>
          <?php
          $i = 0;
          foreach ($emails as $em) {
            ?>
            <p class="class_email">
                <input name="email_check_<?=$i?>" type="checkbox" <?=!$em['visible']?:'checked';?>>Publish field</input>
                <input name="email_<?=$i++?>" size="15" type="email" value="<?=$em['email']?>">
            </p>
            <?php
          }
          ?>
        </div>
        <input type="button" value="Add email" id="add_email">
      </div>
      <div id="vs">
          <input name="user_visible" type="checkbox" <?=!$contact['visible']?:'checked';?>>Publish my contact</input>
      </div>
      <input type="button" value="Save" id="btn">
      <p id="error_field">
      </p>
    </form>

    <?php
    echo '<link rel="stylesheet" href="/views/css/mycontact_css.css">';
    echo '<script src="/views/js/mycontact_js.js"></script>';
  }
}

?>
