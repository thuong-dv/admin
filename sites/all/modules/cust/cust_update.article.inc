<?php

function cust_update_article_form($form, $form_state) {


    $form['cust_update']['#prefix'] = '<div class="cust_wrapper_form">';
    $form['cust_update']['#suffix'] = '</div>';
    
    
    $form['cust_update']['file_upload'] = array (
    '#type' => 'file',
    '#title' => 'Choose file',
    '#description' => 'Select the file to upload.' ); 
    
 
    
    $form['cust_update']['submit'] = array(
        '#type' => 'submit',
        '#name' => 'Submit',
        '#submit' => array('cust_update_article_form_submit'),
        '#validate' => array('cust_update_article_form_validate'),
        '#value' => t('Submit'),
    );

   return $form;
}

function cust_update_article_form_submit($form, $form_state){
    //print_r($form_state);die();
    //print_r($form_state['values']['file_upload']);die();
    //$filepath = file_create_url($form_state['values']['file_upload']->uri);
            $node = node_load(1);
        	$images = $node->field_images[LANGUAGE_NONE]; //lay mang cac gia tri cua field multi value
        	//$edit = array(); 
            $fid = $form_state['values']['file_upload']->fid;
            $tit = $form_state['values']['file_upload']->filename;
            $new_image = array(
                "fid" => $fid,
                "title" => $tit,
            );
        	foreach($images as $image){
           		$new_images[] = $image;//lay gia tri cua mang tren cho vao mang moi(gia tri la nid, uid, value... tuy vao kieu cua field
        	}
         	array_push($new_images, $new_image);//them gia tri moi vao cuoi mang
  
        	foreach($new_images as $k => $img){
        	   //gan gia tri vao cho node hoac user edit hoac save
           		$node->field_images[LANGUAGE_NONE][$k]['fid'] = isset($img['fid']) ? $img['fid'] : '';
                $node->field_images[LANGUAGE_NONE][$k]['title'] = isset($img['title']) ? $img['title'] : '';
                $node->field_images[LANGUAGE_NONE][$k]['alt'] = isset($img['alt']) ? $img['alt'] : '';
		
        	}
            //print_r($edit);die();
        
        	node_save($node);  
            if($node->nid){
                drupal_set_message(t("$node->nid have been updated"), 'status');
            }
}
function cust_update_article_form_validate(&$form, &$form_state) {
  
  // Handle file uploads.
  //$validators = array('file_validate_extensions' => array('csv'));
  $validators = array('file_validate_extensions' => array('png jpg gif jpeg'));
  $destination = 'public://cust_update_images/'; //tao thu muc chua file

  // Prepare the pictures directory.
  file_prepare_directory($destination, FILE_CREATE_DIRECTORY);
  // Check for a new uploaded background.
  $file = file_save_upload('file_upload', $validators, $destination, FILE_EXISTS_RENAME);
  if (isset($file)) {
    // File upload was attempted.
    if ($file) {
      // Put the temporary file in form_values so we can save it on submit.
      $form_state['values']['file_upload'] = $file;
    }
    else {
      // File upload failed.
      form_set_error('file_upload', t('The file could not be uploaded.'));
    }
  }
  
}
