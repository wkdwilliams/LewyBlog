function login(){
  $.post('/User/authenticate', {username:$("#username").val(), password:$("#password").val()}, (data) => {
    if(data == 0)
    {
      $("#loginreply").css({"display":"block", "color":"red"})
      .text("Incorrect Login!");
    }
    else {
      location.href="/";
    }
  });
}

$('.image').magnificPopup({type:'image'});
