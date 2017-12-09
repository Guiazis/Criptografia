$(function(){
    var $doc = $('html, body');
    $(document).scroll(function() {
      var scrollPage = window.pageYOffset
      var opacity = ((-1)/620)*scrollPage + 1;
      var topLogo = ((-185)/400)*scrollPage + 185;
      $('.logo-img, .icon-arrow').css('opacity', opacity);
      $('.header-logo').css('top', topLogo);
      console.log(scrollPage);
    });
    $('a').click(function() {
        $doc.animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 1000);
        return false;
    });
});
