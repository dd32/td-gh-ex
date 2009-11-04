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
  
  // Make the text in the searchbar disappear
  jQuery('input#s').focus(function(){
    if (jQuery(this).val() != ''){
      jQuery(this).attr('rel', jQuery(this).val() );
      jQuery(this).val('');
    }
  });
  
  jQuery('input#s').blur(function(){
    if (jQuery(this).val() == ''){
      jQuery(this).val(jQuery(this).attr('rel'));
    }
  });
    
});
