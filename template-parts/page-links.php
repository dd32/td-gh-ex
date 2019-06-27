<?php
    if ( is_singular('post') ) {?>
        <nav class="page-pagination">
           <ul class="pagination d-flex justify-content-between themeix-highlight">
               <?php 
                  if(!empty(get_previous_post_link())){?>
                       <li class="page-item themeix-highlight">
                         <?php previous_post_link($format = '%link', $prev = esc_html__('<< Previous Post', 'axiohost'), $title = 'no' ) ?>
                      </li>
                 <?php
                 }
              ?>
             
              <?php 
                  if(!empty(get_next_post_link())){?>
                      <li class="page-item themeix-highlight"> 
                         <?php next_post_link($format = '%link', $next = esc_html__('Next Post >>', 'axiohost'), $title = 'no' ) ?>
                      </li>
                 <?php
                 }
              ?>
              
           </ul>
        </nav>
    <?php
    }
?>