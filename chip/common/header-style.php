<?php
global $chip_life_global;
if( $chip_life_global['theme_options']['chip_life_header_style'] == "header" && get_header_image() ):
locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'header-background.php' ), true, false );
else:
locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'logospon.php' ), true, false );
endif;
?>