<?php

class View {

  function show_page() {

  ?>

  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <title>Phonebook</title>
    </head>
    <body>
      <header>
        <div id='site_name'>
        Phonebook
        </div>
        <div id='logout'>
          LOGOUT
        </div>
      </header>
      <nav>
        <div id ="public_phonebook" class="name_items">Public phonebook</div>
        <div id ="my_contact" class="name_items">My contact</div>
      </nav>
      <aside>
        Waiting...
      </aside>
    </body>
    <link rel="stylesheet" href="/views/css/homepage_css.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/views/js/homepage2_js.js"></script>
  </html>

  <?php

  }
  
}

?>
