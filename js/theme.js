document.write = document.writeln = function(str){ /* Please do nothing. */ };

jQuery(function(){
  
  document.write = document.writeln = function(str){
     /* So, the DOM is ready but what to do with the string?
        > http://DennisHoppe.de
     */ 
  };
  
  // IE have to learn :focus
  jQuery('input, textarea')
    .focus(function(){
      jQuery(this).addClass('focus');
    })
    .blur(function(){
      jQuery(this).removeClass('focus');
    });
    
});
