(function($) {
  "use strict"; 

  var mobileMenuOutsideClick = function() {
    $(document).click(function (e) {
      var container = $("#site-offcanvas, .js-site-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.js-site-nav-toggle').addClass('site-nav-white');

        if ( $('body').hasClass('offcanvas') ) {
          $('body').removeClass('offcanvas');
          $('.js-site-nav-toggle').removeClass('active');
        }   
      }
    });
  };

  var offcanvasMenu = function() {
    $('#container').prepend('<div id="site-offcanvas" />');
    $('#container-boxed').prepend('<div id="site-offcanvas" />');
    $('#container-boxed-left').prepend('<div id="site-offcanvas" />');
    $('#container').prepend('<a href="#" class="js-site-nav-toggle site-nav-toggle site-nav-white"><i></i></a>');
    $('#container-boxed').prepend('<a href="#" class="js-site-nav-toggle site-nav-toggle site-nav-white"><i></i></a>');
    $('#container-boxed-left').prepend('<a href="#" class="js-site-nav-toggle site-nav-toggle site-nav-white"><i></i></a>');
    var clone1 = $('.theme-menu').clone();
    $('#site-offcanvas').append(clone1);

    $('#site-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
    $('#site-offcanvas')
      .find('li')
      .removeClass('has-dropdown');  

    // Hover dropdown menu on mobile
    $('.offcanvas-has-dropdown').mouseenter(function(){
      var $this = $(this);

      $this
        .addClass('active')
        .find('ul')
        .slideDown(500, 'easeOutExpo');       
      }).mouseleave(function(){

      var $this = $(this);
      $this
        .removeClass('active')
        .find('ul')
        .slideUp(500, 'easeOutExpo');       
      });

    $(window).resize(function(){

      if ( $('body').hasClass('offcanvas') ) {
        $('body').removeClass('offcanvas');
        $('.js-site-nav-toggle').removeClass('active');
      }
    });
  };

  var burgerMenu = function() {
    $('body').on('click', '.js-site-nav-toggle', function(event){
      var $this = $(this);

      if ( $('body').hasClass('overflow offcanvas') ) {
        $('body').removeClass('overflow offcanvas');
      } else {
        $('body').addClass('overflow offcanvas');
      }
      $this.toggleClass('active');
      event.preventDefault();

    });
  };

  // store the slider in a local variable
  var $window = $(window),
    flexslider = { vars:{} };
 
  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 600) ? 2 :
           (window.innerWidth < 900) ? 3 : 4;
  }

  $(window).load(function(){

    // mobile menu
    mobileMenuOutsideClick();
    offcanvasMenu();
    burgerMenu();

    // preloader
    $('#status').fadeOut(); 
    $('#preloader').delay(350).fadeOut('slow'); 
    $('body').delay(350).css({'overflow':'visible'});


    // superfish menu
    $('.theme-menu').find('li:has(ul)').addClass('has-menu');
    $('ul.sf-menu').superfish({
      delay: 1000,                           
      animation: { opacity:'show',height:'show' }, 
      speed: 'fast',                         
      autoArrows: false  
    });


    // scrolltop
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#toTop').fadeIn();
      } else {
        $('#toTop').fadeOut();
      }
    });

    $("#toTop").click(function(){
      $("html, body").animate({ scrollTop: 0 }, 600);
      return false;
    });  


    // fade text
    setTimeout(function(){
      $(".agent-form .sent").fadeOut("slow", function () {
        $(".agent-form .sent").remove();
      });
    }, 7000);


    // selectbox
    $('.advance-search-block select').select2();
    $('.advance-search-widget select').select2();
    

    // slide toggle
    $('a.slide-toggle').click(function() {
      $('.sliding-bar').slideToggle('fast', function() {
        $('a.slide-toggle').toggleClass('open', $(this).is(':visible'));
      });
      return false;
    });

    
    // order and sort
    $('select[name=sortby]').on('change', function () {
      $('.form-sorting-order').submit();
    });

    $('select[name=order]').on('change', function () {
      $('.form-sorting-order').submit();
    });


    // create new block
    var divs = $(".grid-cols .post-col-6");
    for(var i = 0; i < divs.length; i+=2) {
      divs.slice(i, i+2).wrapAll("<div class='clearfix'></div>");
    }

    var divs = $(".grid-cols .post-col-3");
    for(var i = 0; i < divs.length; i+=4) {
      divs.slice(i, i+4).wrapAll("<div class='clearfix'></div>");
    }

    var divs = $(".grid-cols .post-col-4");
    for(var i = 0; i < divs.length; i+=3) {
      divs.slice(i, i+3).wrapAll("<div class='clearfix'></div>");
    }

    var divs = $(".grid-cols .featured-list");
    for(var i = 0; i < divs.length; i+=3) {
      divs.slice(i, i+3).wrapAll("<div class='clearfix'></div>");
    }


    // image and ajax modal
    $('.large-image-popup').magnificPopup({
      type: 'image',
      fixedContentPos: true,
      gallery:{enabled:true}
    });

    $('.modal-popup').magnificPopup({
      type: 'inline',

      fixedContentPos: true,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });


    // disable empty get fields
    $(".advance-search-form").submit(function() {
      $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
      return true; 
    });
    $( ".advance-search-form" ).find( ":input" ).prop( "disabled", false );

    
    // flexslider
    $('.flexslider').flexslider({ 
      controlNav: true, directionNav: true, smoothHeight: true, touch: true, 
    }); 
    $('.home-flexslider').flexslider({ 
      prevText: "", 
      nextText: "", 
      controlNav: false, 
      smoothHeight: true,  
      touch: true,
      animation: "fade",
      animationSpeed: 700,
      start: function(slider){
        slider.removeClass('flex-loading');
      }
    });
    $('.home-thumb-flexslider').flexslider({ 
      prevText: "", 
      nextText: "", 
      controlNav: false, 
      smoothHeight: true, 
      touch: true,
      animation: "fade",
      animationSpeed: 700,
      start: function(slider){
           slider.removeClass('flex-loading');
        }
    });
    $('.blog-flexslider').flexslider({ 
      prevText: "", 
      nextText: "", 
      controlNav: false, 
      smoothHeight: true, 
      touch: true,
      animationSpeed: 700,
      start: function(slider){
        slider.removeClass('flex-loading');
      }
    });
    $('.testimonial-flexslider').flexslider({ 
      prevText: "", 
      nextText: "", 
      controlNav: false, 
      smoothHeight: true, 
      touch: true
    });
    $('.featured-flexslider').flexslider({ 
      prevText: "", nextText: "", controlNav: false 
    });
    $('#carousel-flex').flexslider({ 
      animation: "slide", 
      controlNav: false, 
      animationLoop: false, 
      slideshow: true, 
      itemWidth: 153, 
      itemMargin: 10, 
      asNavFor: '.properties-flexslider', 
      prevText: "", 
      nextText: "" 
    });
    $('.properties-flexslider').flexslider({ 
      animation: "fade",
      prevText: "", 
      nextText: "", 
      controlNav: false, 
      smoothHeight: true, 
      sync: "#carousel-flex", 
      slideshow: true,
      touch: true,
      animationSpeed: 700,
      start: function(slider){
        slider.removeClass('flex-loading');
      }
    });
    $('.portfolio-flexslider').flexslider({ 
      prevText: "", 
      nextText: "", 
      controlNav: false, 
      smoothHeight: true, 
      slideshow: true,
      touch: true,
    });
    $('.partners-flexslider').flexslider({ 
      animation: "slide", 
      animationLoop: true, 
      itemWidth: 280, 
      itemMargin: 0,  
      prevText: "", 
      nextText: "",
      controlNav: false,
      rtl: true,
      touch: true,
      maxItems: getGridSize(),
      minItems: getGridSize(),
      move: 0,
    });

  });

  // check grid size on resize event
  $window.resize(function() {
    var gridSize = getGridSize();
 
    flexslider.vars.minItems = gridSize;
    flexslider.vars.maxItems = gridSize;
  });

})(jQuery);