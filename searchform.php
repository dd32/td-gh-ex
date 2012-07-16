<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Searchform Template
 *
 *
 * @file           searchform.php
 * @package        Sampression Lite 
 * @author         Sampression (sampression.com)
 * @copyright      2012 Sampression
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/sampression/searchform.php
 * @since          available since Release 1.0
 */
?>
<form method="get" id="searchform" class="clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="hidden" for="s"><?php _e('Search for:'); ?></label>
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="text-field" placeholder="Search" />
    <input type="submit" id="searchsubmit" value="Search" />
</form>