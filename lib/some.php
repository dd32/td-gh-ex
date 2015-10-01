<?php 
/*
*
*
*This function creates a link for the author of the theme.
*
*/
if(!function_exists('afia_footer_text')):
function afia_footer_text ()
{
	
	$txt = __('Theme designed and maintained by: ','Afia').'Dominic_N ';
	return $txt;
}
endif;

?>