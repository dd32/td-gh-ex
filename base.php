<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <div id="wrapper">
    <?php do_action('get_header');
        get_template_part('templates/header');
    ?>
  
    <?php do_action('yds_afterheader'); include backyard_template_path(); ?>
    
   
      <?php do_action('get_footer');
      get_template_part('templates/footer'); ?>
    </div><!--Wrapper-->
  </body>
</html>
