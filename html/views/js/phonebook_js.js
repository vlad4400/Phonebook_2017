var id_data;

function funcBefore() {
  $(id_data).html("Waiting...");
}

function fucnSuccess(data) {
  $(id_data).html(data);
}

$(".link").bind("click", function() {
  if ($(this).attr("vis") == "true") {
    $(this).attr("vis","false");
    $(this).text("Hide details");
    id_data = $(this).parent().nextAll();
    var id_user = $(this).parent().parent().attr("id");
    id_user = id_user.substring(9);
    $.ajax ({
        url: "/controllers/sub_blockcustomer_controller.php",
        type: "POST",
        data: ({id: id_user}),
        beforeSend: funcBefore,
        success: fucnSuccess
      });
  } else {
    $(this).attr("vis","true");
    $(this).text("View details")
    $(this).parent().nextAll().text("");
  }
});
