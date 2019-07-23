<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Best_Charity_Repeater_Setting' ) ) {

	
	class Best_Charity_Repeater_Setting extends WP_Customize_Setting {

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );

			// Will onvert the setting from JSON to array. Must be triggered very soon.
			add_filter( "customize_sanitize_{$this->id}", array( $this, 'sanitize_repeater_setting' ), 10, 1 );
		}

	
		public function value() {
			$value = parent::value();
			if ( ! is_array( $value ) ) {
						$value = array();
			}

			return $value;
		}

		
		public static function sanitize_repeater_setting( $value ) {
            
            if ( ! is_array( $value ) ) {
				$value = json_decode( urldecode( $value ) );
			}
			$sanitized = ( empty( $value ) || ! is_array( $value ) ) ? array() : $value;

			// Make sure that every row is an array, not an object.
			foreach ( $sanitized as $key => $_value ) {
				if ( empty( $_value ) ) {
					unset( $sanitized[ $key ] );
				} else {
					$sanitized[ $key ] = (array) $_value;
				}
			}

			$sanitized = array_values( $sanitized );

			return $sanitized;
            
		}                
	}
}
