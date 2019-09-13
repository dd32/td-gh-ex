<?php
/**
 * Template for Header Social Meida
 *
 * @package     Ascent
 * @since       3.7.0
 */
?>

<div class="header-social-icon-wrap">

    <ul class="social-icons">
       <?php
        $socialmedia_navs = ascent_socialmedia_navs();
        foreach ( $socialmedia_navs as $name => $item_class ) {
          $social_url = ascent_get_options( $name );
          if ( $social_url ) {
            echo '<li class="social-icon"><a target="_blank" href="'.esc_url( $social_url ).'"><i class="'.$item_class.'"></i></a></li>';
          }
        }
        ?>
    </ul>
    
</div>