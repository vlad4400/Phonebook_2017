<?php

class View {

  function show_page() {

  ?>

    <div id="form">
      <form>
        <div class="input">
          USARNAME <input type="text" name="login">
        </div>
        <div class="input">
          PASSWORD <input type="text" name="password">
        </div>
        <div class="submit">
          <input type="submit" value="LOGIN">
        </div>
      </form>
    </div>
    <link rel="stylesheet" href="/views/css/login_css.css">
    <script src="/views/js/login_js.js"></script>

  <?php
  
  }
}

?>
