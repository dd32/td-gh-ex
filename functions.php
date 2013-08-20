<?php
/**
 *
 * Sueva Theme Functions
 *
 * This is your standard WordPress
 * functions.php file.
 *
 * @author  Alessandro Vellutini
 *
*/

/* CORE */
require_once dirname(__FILE__) . '/core/core.php';

/* STYLE  */
require_once dirname(__FILE__) . '/core/add-style.php';

/* WIDGET  */
require_once dirname(__FILE__) . '/core/add-widgets.php';
require_once dirname(__FILE__) . '/core/register-metaboxes.php';
require_once dirname(__FILE__) . '/core/admin/function_panel.php';

/* SHORTCODE */
require_once dirname(__FILE__) . '/core/register-shortcode.php';


?>