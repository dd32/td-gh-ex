jQuery(document).ready(function($) {
    
	
	
	$(document).on("click", ".anorya_upload_image_button", function() {

        jQuery.data(document.body, 'prevElement', $(this).prev());

        window.send_to_editor = function(html) {
            var imgurl = jQuery('img',html).attr('src');
            //var inputText = $(this).prev('input').val();
			var inputText = jQuery.data(document.body, 'prevElement');
			//alert ('Image Url:'+imgurl+'     InputText:'+inputText.val());

            if(inputText != undefined && inputText != '')
            {
                inputText.val(imgurl);
	        }
			
			tb_remove();
			
            
        };

        tb_show('', 'media-upload.php?type=image&TB_iframe=1');
        return false;
    });
});


	


