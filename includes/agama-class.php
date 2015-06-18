<?php
/**
 * Agama Class
 *
 * @since Agama v1.0.1
 */
if( ! class_exists( 'Agama' ) ) {
	class Agama
	{
		/**
		 * Get Post Meta
		 *
		 * @since Agama v1.0.1
		 */
		public function get_meta( $meta_key ) {
			global $post;
			if( $post )
			return get_post_meta( $post->ID, $meta_key, true );
		}
	}
	global $Agama;
	$Agama = new Agama;
}