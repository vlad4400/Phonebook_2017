var i;

i = $(".class_phonenumber").length;

$("#add_phone_number").click(function() {

  $("#id_phones").append('\
    <p class="class_phonenumber">\
    <input name="phone_check_' + i + '" type="checkbox">Publish field</input>\
    <input name="phone_' + i + '" size="15" type="text">\
    </p>\
  ');

  i++;

});

var j;

j = $(".class_email").length;

$("#add_email").click(function() {

  $("#id_emails").append('\
    <p class="class_email">\
    <input name="email_ckeck_' + j + '" type="checkbox">Publish field</input>\
    <input name="email_' + j + '" size="15">\
    </p>\
  ');

  j++;

});

$("#btn").click(function() {

  var formData = $("form").serialize(); //take values of form;

  $.ajax({
      type: "POST",
      url: "/controllers/do_save_controller.php",
      data: formData,
      beforeSend: function() {
        $("#error_field").text("Waiting...");
      },
      success: function(data) {
        $("#error_field").html(data);
        $("aside").scrollTop($(document).height());
      }
  });
});

$("form").click(function() {

  $("#error_field").html("");
});
