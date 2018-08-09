jQuery(document).ready(function( $ ) {
  
  // home page height
  function centerInit() {
    var hometext = jQuery('.home-template')
    hometext.css({
      "height": jQuery(window).height() + "px"
    });
  }
  
  centerInit();
  jQuery(window).resize(centerInit);
  
  // slide in menu
  var slide = false;
  $(".menu-icon-main").on( "click", function() {

    if (slide == false) {
      jQuery(".menu-icon.menu-icon-main").addClass("opened");
      jQuery(this).parent().parent().find(".main-menu").addClass("showmenu");
      slide = true;
    }
    else {
      jQuery(this).parent().parent().find(".main-menu").removeClass("showmenu");
      jQuery(".menu-icon.menu-icon-main").removeClass("opened");
      slide = false;
    }
  });
  
});