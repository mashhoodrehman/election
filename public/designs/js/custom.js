
$(document).ready(function() {

$(function(){
  $(".owl-carousel .owl-item").removeClass('active');
});

      

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    nav: true,
    navText: [
      "<img src='images/left-arrow.png'>",
      "<img src='images/right-arrow.png'>"
    ],
    responsive:{
        0:{
            items:1,
            nav:true

        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false
        },
        1600:{
            items:4,
            nav:true,
            loop:false

        }
    }
})


$( ".openmodal" ).click(function() {
  
  $('#myModal').modal('hide');

  $('#registerModal').modal('show');
});

$( ".sign-modal" ).click(function() {
 $('#myModal').modal('show');

  $('#registerModal').modal('hide');
});

$("input[type='image']").click(function() {
    $("input[id='my_file']").click();
});

jQuery(function($) {
  $('input[type="file"]').change(function() {
    if ($(this).val()) {
        error = false;
    
      var filename = $(this).val();
      console.log(filename);
            $(this).closest('.dropZoneContainer').find('.file-name').html(filename);

      if (error) {
        parent.addClass('error').prepend.after('<div class="alert alert-error">' + error + '</div>');
      }
    }
  });
});


$(function () {
     $('input[type="file"]').change(function () {
          if ($(this).val() != "") {
                 $(this).css('color', '#333');
          }else{
                 $(this).css('color', 'transparent');
          }
     });
})





$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});


  $(".state-dropdown").select2({
      placeholder: "Select a school",
  allowClear: true
  });
});



(function( $ ) {

    //Function to animate slider captions 
  function doAnimations( elems ) {
    //Cache the animationend event in a variable
    var animEndEv = 'webkitAnimationEnd animationend';
    
    elems.each(function () {
      var $this = $(this),
        $animationType = $this.data('animation');
      $this.addClass($animationType).one(animEndEv, function () {
        $this.removeClass($animationType);
      });
    });
  }
  
  //Variables on page load 
  var $myCarousel = $('#carousel-example-generic'),
    $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
    
  //Initialize carousel 
  $myCarousel.carousel();
  
  //Animate captions in first slide on page load 
  doAnimations($firstAnimatingElems);
  
  //Pause carousel  
  $myCarousel.carousel('pause');
  
  
  //Other slides to be animated on carousel slide event 
  $myCarousel.on('slide.bs.carousel', function (e) {
    var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
    doAnimations($animatingElems);
  });  
    $('#carousel-example-generic').carousel({
        interval:50,
        pause: "false"
    });
  
})(jQuery); 
