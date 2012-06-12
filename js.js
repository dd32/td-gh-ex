jQuery(document).ready(function(){
     jQuery('#json_click_handler').click(function(){
          doAjaxRequest();
     });
});
function doAjaxRequest(){
     // here is where the request will happen
     jQuery.ajax({
          url: 'http://www.yourwpdirectory.com/wp-admin/admin-ajax.php',
          data:{
               'action':'do_ajax',
               'fn':'get_latest_posts',
               'count':10
               },
          dataType: 'JSON',
          success:function(data){
                 // our handler function will go here
                 // this part is very important!
                 // it's what happens with the JSON data
                 // after it is fetched via AJAX!
                             },
          error: function(errorThrown){
               alert('error');
               console.log(errorThrown);
          }
 
     });
 
}