<?php
/**
* at-snow.php
* @author    Denis Franchi
* @package   Atomy
* @version   1.0.4
*
*/
?>

<section class="snow-container">
  <div id="snowflakeContainer">
  <p class="snowflake"><?php esc_html_e('*','atomy');?></p>
	</div>
</section>

<?php wp_enqueue_script('at-snow-js', get_template_directory_uri() . '/js/at-snow.js', array(), 'v1.0.0', true );?>