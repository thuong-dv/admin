<?php global $user; ?>
    <?php print $fields['title']->content; ?>
    <?php print $fields['field_price_description']->content; ?>
    <?php print $fields['field_product_description']->content; ?>
    <?php 
    if($user->uid){
        print $fields['view_node']->content; 
    }else{
        print '<div class="join_now"><a href="/user/register"><span>Subscribe Now</span></a></div>';
        }
    ?>