<?php
/**
 * @subpackage Avedon
 * @since Avedon 1.07
 */
?>

<div id="side" class="span4 offset-1">
<div class="well sidebar-nav">

<?php
if ( is_front_page()) { if ( ! dynamic_sidebar( 'home-right' ) ); }
elseif ( is_page()) { if ( ! dynamic_sidebar( 'sidebar-page' ) ); }
elseif ( is_search()) { if ( ! dynamic_sidebar( 'sidebar-page' ) ); }
elseif ( is_archive()) { if ( ! dynamic_sidebar( 'sidebar-page' ) ); }
elseif ( is_singular()) { if ( ! dynamic_sidebar( 'sidebar-posts' ) ); }
?>

</div>
<?php if ( of_get_option('social_icons') ) { get_template_part('helper/sociallinks'); } ?>
</div>
</div>