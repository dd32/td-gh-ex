<?php
/**
* at-hover-effect.css
* @author    Franchi Design
* @package   Atomy
*/
?>
<style>
.atom-icon-header i {
	display: inline-block;
	transition-duration: 0.3s;
	transition-property: transform;
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	transform: translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
}
.atom-col-2:hover .atom-icon-header i {
	transform: scale(0.9);
}
</style>