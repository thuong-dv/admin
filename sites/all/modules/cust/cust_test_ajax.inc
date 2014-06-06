<?php

function cust_form($form, $form_state) {


    $form['#prefix'] = '<div class="cust_wrapper_form">';
    $form['#suffix'] = '</div>';
    $form['#method'] = 'get';
    $opts_def = 0;
    $opts = array(0 => t('Call Letters'), 1 => t('Market'), 2 => t('Name'));
    $tex_def = isset($form_state['values']['filter_options']) ? $form_state['values']['filter_options'] : 0;
    
    if($tex_def == 0){
        $action = '/aff-search-results/station';
    }elseif($tex_def == 1){
        $action = '/aff-search-results/market';
    }else{
        $action = '/aff-search-results/name';
    }
    $form['#action'] = $action;
    
    $form['station'] = array(
        '#type' => 'textfield',
          '#title' => t(''),
          '#size' => 60,
          '#maxlength' => 128,
          
    );
    $form['market'] = array(
        '#type' => 'textfield',
          '#title' => t(''),
          '#size' => 60,
          '#maxlength' => 128,
          
    );
    $form['first_name'] = array(
        '#type' => 'textfield',
          '#title' => t(''),
          '#size' => 60,
          '#maxlength' => 128,
          
    );
    $form['last_name'] = array(
        '#type' => 'textfield',
          '#title' => t(''),
          '#size' => 60,
          '#maxlength' => 128,
          
    );
    
      $form['filter_options'] = array(
        '#type' => 'radios',
        '#title' => t('Search By'),
        '#default_value' => $opts_def,
        '#options' => $opts,
        '#ajax' => array(
          'callback' => 'ajax_cust_option_callback',
          'wrapper' => 'cust_wrapper',
          'method' => 'replace',
          'effect' => 'fade',
        ),
      );
    
 
    
    $form['submit'] = array(
        '#type' => 'submit',
        '#name' => 'Submit',
        '#submit' => array('cust_form_submit'),
        '#value' => t('Submit'),
    );

   return $form;
}

function cust_form_submit($form, $form_state){
    print_r($form_state);die();
}

function ajax_cust_option_callback($form, $form_state) {
    //print_r($form_state);die();
    /*$opt_val = isset($form_state['values']['filter_options']) ? $form_state['values']['filter_options'] : '';
$form_state['values']['filter_text'] = $opt_val;
    $form['filter_text'] = array(
        '#type' => 'textfield',
          '#title' => t('Subject'),
          '#default_value' => $opt_val,
          '#size' => 60,
          '#values' => $opt_val,
          '#maxlength' => 128,
          '#prefix' => '<div id="cust-wrapper-1">',
          '#suffix' => '</div>',
          
    );

 */
 $tex_def = isset($form_state['values']['filter_options']) ? $form_state['values']['filter_options'] : 0;
 if($tex_def == 0){
        $action = '/aff-search-results/station';
    }elseif($tex_def == 1){
        $action = '/aff-search-results/market';
    }else{
        $action = '/aff-search-results/name';
    }
    $form['#action'] = $action;
 $form['filter_text']['#value'] = $tex_def;
  $result = array(
    '#type' => 'ajax',
    '#commands' => array(
      //ajax_command_replace('#cust_wrapper', drupal_render($form['filter_text'])),
        //ajax_command_replace(NULL, drupal_render($form)),
        ajax_command_replace('.cust_wrapper_form', drupal_render($form)), 
    ),       
  );
  
  
  return $result;
    
    
    
}