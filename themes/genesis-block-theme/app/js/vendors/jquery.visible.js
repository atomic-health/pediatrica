!(function(win, doc, $) {
  'use strict';
  
  $.fn.AddClassWhenVisible = function(options) 		{
    var $this = this;
    var settings = {
      class: "",
      removeClassWhenHidden: false,
      replaceClass: "",
      viewOffset: 40
    };
    var scrollY = win.pageYOffset;
    var viewportHeight = Math.max(doc.documentElement.clientHeight, win.innerHeight || 0);
    
    var ready = false;
    $.extend(settings,options);

    var percentOffset = (settings.viewOffset * viewportHeight)/100;
    
    win.addEventListener( "scroll", function() {
      //console.log(viewportHeight, percentOffset);
      scrollY = win.pageYOffset;
      requestAnimationFrameWhenReady();
    }, false );
    
    function requestAnimationFrameWhenReady()
    {
      if( !ready )
      {
        requestAnimationFrame(animate);
        ready = true;
      }
    }
    function animate()
    {
      var elemTop = $this.offset().top;
      if( !settings.removeClassWhenHidden )
      {          
        if( scrollY + percentOffset < elemTop && scrollY + viewportHeight + percentOffset > elemTop )
        {
          if( !$this.hasClass(settings.class) )
          {
            $this.addClass(settings.class);
            if( settings.replaceClass != "" )
            {
                $this.removeClass(settings.replaceClass);
            }
          }
        }
      }
      else
      {
        var elemHeight = $this.height();
        var elemBot = elemTop + elemHeight;
        var viewportBot = ( scrollY + viewportHeight ) - percentOffset;
          if( elemTop < viewportBot && elemBot > scrollY )
        {
                    if( !$this.hasClass(settings.class) )
          {
            $this.addClass(settings.class);
            if( settings.replaceClass != "" )
            {
                $this.removeClass(settings.replaceClass);
            }
          }
        }
        else
        {
          if( $this.hasClass(settings.class) )
          {
                        $this.removeClass(settings.class);
              if( settings.replaceClass != "" )
            {
                $this.addClass(settings.replaceClass);
            }
          }
        }
      }
      
      ready = false;
    }
    return this;
  };  
})(window, document, window.jQuery);