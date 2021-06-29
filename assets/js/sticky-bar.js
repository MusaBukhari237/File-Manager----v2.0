$(function () {
    $(document).scroll(function () {
      var $nav = $(".sticky-bar");
      $nav.toggleClass('sticky-bar-scrolled', $(this).scrollTop() - 100 > $nav.height());
      var $nav = $(".Form-Search");
      $nav.toggleClass('whiteborder', $(this).scrollTop() - 100 > $nav.height());
      var $nav = $(".controlmenu");
      $nav.toggleClass('whiteborder', $(this).scrollTop() - 100 > $nav.height());
      
             
    });
  });