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

// Remove all break tags from pretty print
$('.prettyprint').each((index, el) => {
  $(el).find("br").remove();
});

$('.PDFView').EZView();

$('.PDFView').on('click', () => {
  //$('div.container')[0].remove();
  $('.tools-container').remove();
});
