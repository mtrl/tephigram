$(document).ready(function() {
   $('.selectorDiv-toggle').on('click', function() {
      if($(this).hasClass('opened')) {
          $(this).removeClass('opened')
          $(this).text('V');
          $('#selectorDiv').hide();
      } else {
          $(this).addClass('opened')
          $(this).text('^');
          $('#selectorDiv').show();
      }
   });
});