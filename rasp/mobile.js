$(document).ready(function() {
   $('.selectorDiv-toggle').on('click', function() {
      if($(this).hasClass('open')) {
          $(this).toggleClass('open').find('.fa').removeClass('fa-angle-up').addClass('fa-angle-down').find('span').text('Show options');
          $('#selectorDiv').hide();
      } else {
          $(this).toggleClass('open').find('.fa').removeClass('fa-angle-down').addClass('fa-angle-up').find('span').text('Hide');
          $('#selectorDiv').show();
      }
   });
});