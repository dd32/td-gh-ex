<?php

$form = '<form method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
<input type="text" name="s" placeholder="' . esc_attr_x('Search', 'atwood') . '" value="' . get_search_query() . '" title="' . _x('Search for:', 'label', 'atwood') . '" />
<button type="submit" class="btn">' . __('Go', 'atwood') . '</button>
</form>';

echo $form;
?>
