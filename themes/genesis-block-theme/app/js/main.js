$(document).ready(function(){
  $(window).on('scroll', function(){
    $('[class*="section--"]').each(function(){
      $(this).AddClassWhenVisible({
        class: 'do--animation', 
        replaceClass: '', 
        removeClassWhenHidden: false, 
        viewOffset: -50 
      });
    })
  })
});