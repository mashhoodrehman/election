

$(function(){
  $(".owl-carousel .owl-item").removeClass('active');
});

      




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

            $(this).closest('.dropZoneContainer').find('.file-name').html(filename.split('\\').pop());

      if (error) {
        parent.addClass('error').prepend.after('<div class="alert alert-error">' + error + '</div>');
      }
    }
  });
});







$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
        ul.hide();
        $(this).removeClass("active");
    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});




