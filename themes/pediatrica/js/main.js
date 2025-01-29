(function($) {
  $(document).ready(function(){
    var headerHeight = $('.page__header, .home__hero').outerHeight();
    $(window).on('scroll', function(event){
      var scrollAmount = $(window).scrollTop();

      if(scrollAmount >= headerHeight) {
        $('.header__main').addClass('is--floating');
      } else {
        $('.header__main').removeClass('is--floating');
      }
    });
  });
}(jQuery));