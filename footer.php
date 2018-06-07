<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a-portfolio
 */

?>
<!-- Start Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="copyright">
          <ul class="footer-social">
            <?php 
            $social_name_arrays = array(
                        'fa fa-linkedin'=>'Linkedin',
                        'fa fa-facebook'=>'Facebook',
                        'fa fa-twitter'=>'Twitter',
                        'fa fa-youtube'=>'Youtube',
                        'fa fa-behance'=>'Behance'
                        );
            ?>
            <?php foreach($social_name_arrays as $key=>$social_name):
                ?>
                <?php if(get_theme_mod( 'a_portfolio_footer_social_url_'.$social_name)):?>
                  <li>
                    <a href="<?php echo esc_url(get_theme_mod( 'a_portfolio_footer_social_url_'.$social_name))?>">
                      <i class="<?php echo esc_attr( $key );?>"></i>
                    </a>
                  </li>
                <?php endif;?>
            <?php endforeach;?>
          </ul>
          <?php echo esc_html__('&copy; All Right Reserved ','a-portfolio');  echo  esc_html(date('Y'));?> <?php bloginfo('name'); ?>
        </div>
      </div>
    </div>
  </div>
</footer>
  <!-- End Footer -->

<?php wp_footer(); ?>

</body>
</html>
