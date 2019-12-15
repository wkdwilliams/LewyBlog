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

$('.container img').on('click', function() {
  console.log(1);
  $("body").append("<div id='imgPop' style='width: 800px; height: 800px; position: fixed; top: calc(50% - 400px); left: calc(50% - 400px); border: 1px solid black'><img style='width: 800px' src='"+$(this)[0].src+"' alt='pop' /></div>");
  setTimeout(()=>{
    $("body").on('click', () => {
      $("#imgPop").remove();
    });
  }, 500);
});
