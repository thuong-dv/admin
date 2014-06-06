<?php
    global $clas;
    global $user;
    $clas++;
    $file_uri = isset($fields['uri']->content) ? file_create_url(trim(strip_tags($fields['uri']->content))) : ''; 
    $nid_photo = strip_tags($fields['nid']->content);
    
?>

<div class="views-field views-field-field-image">
    <div class="field-content">
        <?php print strip_tags($fields['field_image']->content, '<img>'); ?>
    </div>
</div>

<div class="views-field views-field-title-1">
    <span class="field-content">
        <?php print strip_tags($fields['title_1']->content); ?>
    </span>
</div>

<div class="views-field views-field-created">
    <?php print $fields['created']->content; ?>
</div>

<div class="views-field views-field-name">
     <?php print $fields['name']->content; ?>
</div>

<div class="views-field views-field-field-price">
    <span class="views-label views-label-field-price">Price: </span>
    <span class="field-content"><?php print strip_tags($fields['price']->content); ?></span>
    <span class="views-field views-field-add-to-cart">
        <?php
            if ($user->uid){
                $kt = _cust_check_purchased($nid_photo);
                if ($kt){
                    $file_uri_download = isset($fields['uri']->content) ? file_create_url(trim(strip_tags($fields['uri']->content))) : '';
                    $output = '<div class="link-purchase"><a target="_blank" href="'.$file_uri.'">Download photo</a></div> ';
                    print $output;
                }else{
                    print $fields['add_to_cart']->content;
                }
            }else{
                $output = '<a class="button basic-cart-add-to-cart-link" href="/user/register">Buy photo</a>';
                print $output;
            }
        ?>
    </span>
</div>

<div class="views-field views-field-view-node">
    <?php print $fields['view_node']->content; ?>
</div>

<div class="views-field views-field-php">
    <?php //print $fields['php']->content; ?>
</div>
