(function( $ ){

  $('#hey').html( '<p>Hey Button</p>' ).click(function() {
    console.log('hey!');
    $("h3").css("background-color", "white");
    $(this).css("background-color", "red");
  });
 
})( jQuery );
