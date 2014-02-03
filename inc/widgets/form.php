<?php
/**
 * @package Athenea
 */
/* Copyright 2013 IBERMEGA digital (email : soporte@ibermega.com)

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
  
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
class atheneaform_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'atheneaform_widget',
			__( 'Athenea Contact', 'athenea' ),
			array( 'description' => __( 'Contact Form', 'athenea' ) )
		);

		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_head', array( $this, 'css' ) );
		}
	}

	function css() {
    // CSS
	}

	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance['title'] );
		}
		else {
			$title = __( '', 'athenea' );
		}
?>
<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'athenea' ); ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php 
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function widget( $args, $instance ) {
		$count = get_option( 'atheneaform_widget' );

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
?>
<!-- atheneaform -->
<form role="form" enctype="multipart/form-data" action="https://paneles.gestiondecuenta.com/comprobar-formulario/" method="POST" id="formGenGdc">

  <div class="form-group">
    <label for="<?php _e( 'Name', 'athenea' ); ?>">
      <span class="glyphicon glyphicon-user"></span> <?php _e( 'Name', 'athenea' ); ?>  
    </label>
      <input name="<?php _e( 'Name', 'athenea' ); ?>" type="text" class="form-control" id="<?php _e( 'Name', 'athenea' ); ?>" placeholder="<?php _e( 'Full name', 'athenea' ); ?>" required>
  </div>
  
  <div class="form-group">
    <label for="<?php _e( 'E-Mail', 'athenea' ); ?>">
      <span class="glyphicon glyphicon-envelope"></span> <?php _e( 'E-Mail', 'athenea' ); ?>  
    </label>
      <input name="<?php _e( 'E-Mail', 'athenea' ); ?>" type="email" class="form-control" id="Email" placeholder="<?php _e( 'E-mail', 'athenea' ); ?>" required>
  </div>
  
  <div class="form-group">
    <label for="<?php _e( 'Subject', 'athenea' ); ?>">
      <span class="glyphicon glyphicon-info-sign"></span> <?php _e( 'Subject', 'athenea' ); ?>  </label>
      <textarea name="<?php _e( 'Subject', 'athenea' ); ?>" class="form-control" required></textarea>
  </div>
  
  <div class="form-group">
      <div class="checkbox">
        <label>
          <input name="<?php _e( 'Accept', 'athenea' ); ?>" checked type="checkbox"> <?php _e( 'Accept the Privacy Policy.', 'athenea' ); ?>
        </label>
      </div>
  </div>
  
  <div class="form-group">
      <button type="submit" class="btn btn-primary"><?php _e( 'Send', 'athenea' ); ?></button>
	  <input type="hidden" name="redirigir" value="<?php echo esc_url( home_url( '/message-received/' ) ); ?>" />
      <input type="hidden" name="recipe" value="<?php _e( 'office@company.com', 'athenea' ); ?>" />
      <input type="hidden" name="asunto" value="<?php _e( 'They have contacted from their website', 'athenea' ); ?>" />
      <input type="hidden" name="dominio" value="ibermega.com" />
      <input type="hidden" name="idioma" value="<?php _e( 'en', 'athenea' ); ?>" />
  </div>
</form>
<!-- /atheneaform -->
<?php
		echo $args['after_widget'];
	}
}

function atheneaform_register_widgets() {
	register_widget( 'atheneaform_widget' );
}

add_action( 'widgets_init', 'atheneaform_register_widgets' );