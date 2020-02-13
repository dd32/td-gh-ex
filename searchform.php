<?php

$form = '<form method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
<input type="text" name="s" placeholder="' . esc_attr_x('Search and press enter', 'placeholder', 'atwood') . '" value="' . get_search_query() . '" title="' . esc_attr_x('Search for:', 'label', 'diaz') . '" />
</form>';

echo $form;
?>
