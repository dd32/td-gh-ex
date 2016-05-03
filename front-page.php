<?php
// Including any page template for make front page
if ('posts' == get_option('show_on_front')) {
    include(get_home_template());
} else {
    include(get_page_template());
}
?>