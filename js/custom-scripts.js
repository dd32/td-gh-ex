/**
* Custom js for Accesspress Mag
* 
*/

jQuery(document).ready(function($){
        
   
          $('.search-icon i.fa-search').click(function() {
           	 $('.search-icon .ak-search').toggleClass('active');
           });

       $('.ak-search .close').click(function() {
       	 $('.search-icon .ak-search').removeClass('active');
       });
       
       $('.overlay-search').click(function() {
       	 $('.search-icon .ak-search').removeClass('active');
       });
       
   
});