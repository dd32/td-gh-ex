<?php
add_action( 'admin_enqueue_scripts', 'generate_admin_pointers_header' );

function generate_admin_pointers_header() {
   if ( generate_admin_pointers_check() ) {
      add_action( 'admin_print_footer_scripts', 'generate_admin_pointers_footer' );

      wp_enqueue_script( 'wp-pointer' );
      wp_enqueue_style( 'wp-pointer' );
   }
}

function generate_admin_pointers_check() {
   $admin_pointers = generate_admin_pointers();
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] )
         return true;
   }
}

function generate_admin_pointers_footer() {
   $admin_pointers = generate_admin_pointers();
   ?>
<script type="text/javascript">
/* <![CDATA[ */
( function($) {
   <?php
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] ) {
         ?>
         $( '<?php echo $array['anchor_id']; ?>' ).pointer( {
            content: '<?php echo $array['content']; ?>',
            position: {
            edge: '<?php echo $array['edge']; ?>',
            align: '<?php echo $array['align']; ?>'
         },
            close: function() {
               $.post( ajaxurl, {
                  pointer: '<?php echo $pointer; ?>',
                  action: 'dismiss-wp-pointer'
               } );
            }
         } ).pointer( 'open' );
         <?php
      }
   }
   ?>
} )(jQuery);
/* ]]> */
</script>
   <?php
}

function generate_admin_pointers() {
   $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
   $version = '1_0'; // replace all periods in 1.0 with an underscore
   $prefix = 'generate_admin_pointers' . $version . '_';

   $welcome_content = '<h3>' . __( 'Welcome to GeneratePress','generate' ) . '</h3>';
   $welcome_content .= '<p>' . __( 'You can find your GeneratePress options panel in here.','generate' ) . '</p>';
	//$welcome_content .= '<p><a id="gen_customize_button" class="button button-primary" href="' . admin_url('customize.php') . '">' . __('Customize','generate') . '</a> <a id="gen_addon_button" class="button button-primary" href="' . esc_url('http://generatepress.com') . '" target="_blank">' . __('Addons','generate') . '</a> <a title="' . __('Please help support development of the GeneratePress by donating.','generate') . '" class="button button-primary" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UVPTY2ZJA68S6">' . __('Donate','generate') . '</a></p>';

   return array(
      $prefix . 'welcome' => array(
         'content' => $welcome_content,
         'anchor_id' => '#menu-appearance',
         'edge' => 'bottom',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . 'welcome', $dismissed ) )
      )
   );
}