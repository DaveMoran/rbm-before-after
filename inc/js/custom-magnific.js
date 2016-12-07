jQuery(document).ready(function($){
  $('.gallery-wrapper').each(function() {
    $(this).magnificPopup({
      delegate: 'a', // child items selector, by clicking on it popup will open
      type: 'image',
      gallery: {
        enabled: true
      },
      image: {
        titleSrc: function(item) {
          if(item.el.children('img').attr('alt').length > 0) {
            return item.el.children('img').attr('alt');
          } else {
            return "";
          }
        }
      }
    });
  });
});
