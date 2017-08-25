$(document).ready(function() {


// Accordion

$('#accordion dt').stop().click(function() {
 if($(this).hasClass('accordion-active')) {
     $(this).removeClass('accordion-active');
     $(this).next().slideUp(300);
 } else {
     $(this).parent().children().removeClass('accordion-active');
     $(this).addClass('accordion-active');
     if( $(this).next().is('dd')) {
         $(this).parent().children('dd').slideUp(300);
         $(this).next().slideDown(300);
     }
 }
});

});
