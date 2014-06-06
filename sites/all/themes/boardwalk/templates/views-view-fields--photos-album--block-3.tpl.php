<?php
    global $clas;
    global $user;
    $clas++;
    $file_uri = image_style_url('img780',trim(strip_tags($fields['uri']->content))); 
    $nid_photo = strip_tags($fields['nid']->content);
    
    if($nid_photo > 0):
?>

<div class="views-field views-field-field-image">
    <div class="field-content">
        <a href="<?php print $file_uri;?>" class="fancybox1 <?php print $clas;?>" rel="gallery" title="<?php print strip_tags($fields['title']->content); ?>">
            <?php print strip_tags($fields['field_image']->content, '<img>'); ?>
        </a>
    </div>
</div>
<div class="purchase-content"> 
    <div class="views-field views-field-title">
        <?php print $fields['title']->content; ?>
    </div>
   
    <div class="views-field views-field-field-price">
        <span class="views-label views-label-field-price">Price: </span>
         <span class="field-content"><?php print strip_tags($fields['price']->content); ?></span>
    </div>
    
    <div class="views-field views-field-add-to-cart">
        <?php
            if ($user->uid){
                $kt = _cust_check_purchased($nid_photo);
                if ($kt){
                    $file_uri_download = file_create_url(trim(strip_tags($fields['uri']->content)));
                    $output = '<div class="link-purchase"><a target="_blank" href="'.$file_uri_download.'">Download </a></div> ';
                    print $output;
                }else{
                    print $fields['add_to_cart']->content;
                }
            }else{
                $output = '<a class="button basic-cart-add-to-cart-link" href="/user/register">Buy photo</a>';
                print $output;
            }
?>
    </div>

 
</div>
<?php endif; ?>
