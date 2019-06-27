<?php
    global $axiohost;
    if($axiohost['breadcumb'] == 1){
        if(!is_home()){
            if(function_exists('axiohost_breadcrumb')){
                echo ' <div class="axiohost-breadcumb">';
                  echo axiohost_breadcrumb();
                echo '</div>';
            }
        }
    }