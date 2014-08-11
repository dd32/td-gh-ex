<?php
/**
* Pro Init admin actions
*
* 
* @package      Customizr
* @subpackage   classes
* @since        3.0.6
* @author       Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright    Copyright (c) 2013, Nicolas GUILLAUME
* @link         http://themesandco.com/customizr
* @license      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class TC_admin_init_pro {

    function __construct () {
      //load
       locate_template( 'inc/admin/themes-updates/theme-update-checker.php' ,true,true);
       
       //instanciate
       $example_update_checker = new ThemeUpdateChecker(
            'customizr',
            'http://localhost/themes-update-api/info.json'
        );

       //force the check for update
       $example_update_checker -> checkForUpdates();
    }

}//end of class       