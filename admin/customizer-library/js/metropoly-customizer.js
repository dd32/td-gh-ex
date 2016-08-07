jQuery(document).ready( function( $ ) {
			
			$('#customize-theme-controls > ul').append('<li id="accordion-section-avata-forums" class="accordion-section control-section control-section-forums" style="display: list-item;padding: 20px 10px 20px;background: #fff;"><a href="https://www.mageewp.com/forums/" target="_blank" class="">'+avata_params.btn_forum+'</a></li>');
			
		
								 
			if(avata_params.theme_options_version=='1'){
		   $('#customize-theme-controls > ul').prepend('<li id="accordion-section-importer" class="accordion-section control-section control-section-importer" style="display: list-item;padding: 20px 10px 0;background: #fff;"><a href="#" id="import-theme-options" class="button">'+avata_params.import_options+'</a><div class="import-status"></div><p>'+avata_params.transfer+'</p></li>');
		   $(document).on('click','#import-theme-options',function(){
				   $('#accordion-section-importer .import-status').text(avata_params.loading);									   
						$.ajax({type:"POST",dataType:"html",url:avata_params.ajaxurl,data:"action=avata_otpions_customize",
							success:function(data){
								  $('#accordion-section-importer .import-status').text(avata_params.complete);
								 location.reload() ;
								},error:function(){
									$('#accordion-section-importer .import-status').text(avata_params.error);		
									}});
                   });
			}
			
			
					
			
		   } );