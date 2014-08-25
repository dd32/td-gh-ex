<?php

$form = '<form method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
<input type="text" name="s" placeholder="' . esc_attr_x('Search', 'placeholder') . '" value="' . get_search_query() . '" title="' . _x('Search for:', 'label', THEMEORA_THEME_NAME) . '" />
<button type="submit" class="btn">' . __('Go', THEMEORA_THEME_NAME) . '</button>
</form>';

echo $form;
?>