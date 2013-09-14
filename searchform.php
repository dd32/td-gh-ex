<?php
/**
 * @package WordPress
 * @subpackage Avedon
 * @since Avedon 1.05
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-append row-fluid">
<input type="text" class="field span9" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'avedon' ); ?>" /><button type="submit" class="submit btn" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'avedon' ); ?>">Search</button>
</form>