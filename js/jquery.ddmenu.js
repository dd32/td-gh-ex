// Dropdown menu
$(document).ready(function(){
   $('#mainNav li.multiple').hover(function(){
       $(this).children('.ddMenu').show();
       $(this).addClass('dropdown');
   }, function(){
       $(this).children('.ddMenu').hide();
       $(this).removeClass('dropdown');
   })
})


