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

// Lazy load images
lozad().observe();

// Popup image
$('.image').magnificPopup({type:'image'});
