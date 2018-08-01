<?php
$prefix         = atlast_agency_get_prefix();
$aboutStyle     = absint( get_theme_mod( $prefix . '_home_about_style', 1 ) );
get_template_part( 'template-parts/custom-pages/homepage/about/about-style-' . $aboutStyle );
