<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class StructuredData {

	function __construct() {
		add_action( 'attire_mainframe_div_attrs', array( $this, 'ItemType' ) );
		add_filter( 'attire_page_heading_main', array( $this, 'ItemName' ) );
	}

	function ItemType() {
		echo 'itemscope itemtype="http://schema.org/Product"';
	}

	function ItemName( $name ) {
		return '<span itemprop="name">' . $name . '</span>';
	}

}

new StructuredData();