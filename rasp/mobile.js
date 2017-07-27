$(document).ready(function() {
   $('.selectorDiv-toggle').on('click', function() {
      if($(this).hasClass('opened')) {
          $(this).removeClass('opened')
          $(this).find('.fa').removeClass('fa-angle-up').addClass('fa-angle-down').find('span').text('Show options');
          $('#selectorDiv').hide();
      } else {
          $(this).addClass('opened')
          $(this).find('.fa').removeClass('fa-angle-down').addClass('fa-angle-up').find('span').text('Hide');
          $('#selectorDiv').show();
      }
   });
});