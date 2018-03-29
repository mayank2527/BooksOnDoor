$(document).ready(function(){  $("#my1").addClass('animated bounce animated shake wobble');
 
                            });
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 1000);
});

 
  
