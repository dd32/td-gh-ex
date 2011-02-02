// Dropdown menu
$(document).ready(function(){
   $('#mainNav li.multiple').hover(function(){
       $(this).find('.ddMenu').show();
       $(this).addClass('dropdown');
   }, function(){
       $(this).find('.ddMenu').hide();
       $(this).removeClass('dropdown');
   })
})


