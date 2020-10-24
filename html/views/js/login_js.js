$(".submit").click(function(e) {

  e.preventDefault(); //to not reloaded;

  var formData = $("form").serialize(); //take values of form;

  $.ajax({
      type: "POST",
      url: "/controllers/do_login_controller.php",
      data: formData,
      success: function(data) {
          $("aside").html(data);
      }
  });

});
