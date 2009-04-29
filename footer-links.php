<!-- footer widgets -->
  <ul>
    <?php
     if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
      <li>hey look another sidebar :)<br />Add some widgets here to make me dissapear</li>
    <?php endif; ?>
  </ul>
<!-- /footer widgets -->
