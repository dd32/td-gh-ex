<?php
/**
 * The template for displaying the footer.
 *
 * @package affidavit
 */

?>  
            </div>
            <footer class="footer" role="contentinfo">
                <?php
                /**
                 * Functions hooked in to affidavit_footer action.
                 *
                 * @hooked affidavit_template_footer_widgets -10 
                 * @hooked affidavit_template_copyright -15
                 */ 
                    do_action('affidavit_footer'); 
                ?>
            </footer>

        <?php wp_footer(); ?>
    </body>

</html>