<?php


Class View {

  function print_list_customers($list_customers) {

    foreach ($list_customers as $row) {

      ?>

      <div class="block_customer" id="customer_<?=$row['id_user'];?>">
        <div class="subhead">
            <div class="name">
              <?=$row['first_name'];?>
              <?=$row['last_name'];?>
            </div>
            <div class="link" vis="true">
              View details
            </div>
        </div>
        <div class="data">
        </div>
      </div>

      <?php
    }
    echo '<link rel="stylesheet" href="/views/css/phonebook_css.css">';
    echo '<script src="/views/js/phonebook_js.js"></script>';
  }
}

?>
