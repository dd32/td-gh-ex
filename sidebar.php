<div class="grid_4"><?php
  
  If ( is_home() )
    get_sidebar('home');
  ElseIf ( is_date() )
    get_sidebar('archive-date');
  ElseIf ( is_author() )
    get_sidebar('author');
  ElseIf ( is_category() || is_tag() )
    get_sidebar('category-tag');
  ElseIf ( is_single() )
    get_sidebar('post');
  ElseIf ( is_page() || is_singular() )
    get_sidebar('page');
  Else
    get_sidebar('search-404-other');

?></div>