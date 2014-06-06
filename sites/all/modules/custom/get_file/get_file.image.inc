<?php

function get_file_form($form, $form_state) {


    $form['get_file']['#prefix'] = '<div class="cust_wrapper_form">';
    $form['get_file']['#suffix'] = '</div>';
    
    
    /*
    $form['get_file']['file_upload'] = array (
    '#type' => 'file',
    '#title' => 'Choose file',
    '#description' => 'Select the file to upload.' ); 
    */
 
    
    $form['get_file']['submit'] = array(
        '#type' => 'submit',
        '#name' => 'Get file',
        '#submit' => array('get_file_form_submit'),
        //'#validate' => array('get_file_form_validate'),
        '#value' => t('Submit'),
    );

   return $form;
}

function get_file_form_submit($form, $form_state){
    //get_file_files();
    $photoSrc = '';
    $path = '';
    //$image_file = _api_vehicle_data_get_files($photoSrc, $path);
    $image_file = getUrl(16120);
    
    
    /*$url = 'http://promonet.cbs.com/wmm/download/thumbnails.php?loc=2013/09/19/16103/2_BROKE_GIRLS_logo_backplate.jpg_310.jpg/';
    $image_file = file_get_contents_secure($url, 'trangc', 'nikon');*/
    print_r($image_file);die();
    
            /*$node = node_load(1);
        	$images = $node->field_images[LANGUAGE_NONE]; //lay mang cac gia tri cua field multi value
        	//$edit = array(); 
            //$fid = $form_state['values']['file_upload']->fid;
            //$tit = $form_state['values']['file_upload']->filename;
            $fid = $image_file->fid;
            $tit = $image_file->filename;
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
            }*/
            
            
            $node = node_load(1);
            //print_r($node);die();
        	$images = $node->field_files_upload[LANGUAGE_NONE]; //lay mang cac gia tri cua field multi value
        	//$edit = array(); 
            //$fid = $form_state['values']['file_upload']->fid;
            //$tit = $form_state['values']['file_upload']->filename;
            $fid = $image_file->fid;
            $tit = $image_file->filename;
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
           		$node->field_files_upload[LANGUAGE_NONE][$k]['fid'] = isset($img['fid']) ? $img['fid'] : '';
                $node->field_files_upload[LANGUAGE_NONE][$k]['description'] = isset($img['title']) ? $img['title'] : '';
                $node->field_files_upload[LANGUAGE_NONE][$k]['display'] = 1;
		
        	}
            //print_r($edit);die();
        
        	node_save($node);  
            if($node->nid){
                drupal_set_message(t("$node->nid have been updated"), 'status');
            }
    
            
}
function get_file_form_validate(&$form, &$form_state) {
  
  // Handle file uploads.
  //$validators = array('file_validate_extensions' => array('csv'));
  $validators = array('file_validate_extensions' => array('png jpg gif jpeg wav psd'));
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
