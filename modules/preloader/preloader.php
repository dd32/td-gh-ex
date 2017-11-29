<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AttirePreLoader {

	function __construct() {
		add_action( ATTIRE_THEME_PREFIX . "body_content_before", array( $this, 'BeforeBodyContent' ) );
		add_action( ATTIRE_THEME_PREFIX . "body_content_after", array( $this, 'AfterBodyContent' ) );
	}

	function BeforeBodyContent() {

	}

	function AfterBodyContent() {

	}
}

new AttirePreLoader();