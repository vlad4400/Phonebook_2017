$("#logout").bind("click", function() {
  result = confirm("Do you really want to log out of your account?");
  if (result) {
      location="/controllers/do_logout_controller.php";
  }
});

$(".name_items").bind("click", function(){
  $(".name_items").css("background-color",
    "rgba(80, 120, 165, 1)");
  $(this).css("background-color",
    "rgba(230, 160, 0, 1)");
});

function funcBefore() {
  $("aside").text("Waiting...");
}

function funcSuccess(data) {
  $("aside").html(data);
}

$("#public_phonebook").bind("click", function() {
  $.ajax ({
    url: "/controllers/sub_phonebook_controller.php",
    type: "POST",
    beforeSend: funcBefore,
    success: funcSuccess
  });
});

$("#my_contact").bind("click", function() {
  $.ajax ({
    url: "/controllers/sub_mycontact_controller.php",
    type: "POST",
    beforeSend: funcBefore,
    success: funcSuccess
  });
});

/*begin data in aside*/
$.ajax ({
  url: "/controllers/sub_phonebook_controller.php",
  type: "POST",
  beforeSend: funcBefore,
  success: funcSuccess
});
