<?php 
    global $user;
    $file_uri = image_style_url('img780',trim(strip_tags($fields['uri']->content))); 
    
    
    if ($user->uid){
        $nid_photo = strip_tags($fields['nid']->content);
        $kt = _cust_check_purchased($nid_photo);
    
    if ($kt){
        $file_u = file_create_url(trim(strip_tags($fields['uri']->content)));
    $output = '<div class="link-purchase"><a target="_blank" href="'.$file_u.'">Download original picture</a></div> ';
    }else{
         $output = $fields['add_to_cart']->content;
    }
}else{
     $output = '<a class="button basic-cart-add-to-cart-link" href="/user/register">Purchase this photo</a>';
     print $output;
}
?>
<a href="<?php print $file_uri;?>" class="fancybox" rel="gallery" title="<?php print strip_tags($fields['title']->content); ?>"></a>
<div class="purchase-con">
    <?php print $output;?>
</div>