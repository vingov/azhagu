<?php

function azhagu_preprocess_node(&$variables) {
	//Adding the "title" class name for the h2
    $variables['title_attributes_array']['class'][] = 'title';

  	// Grab the node object.
  	$node = $variables['node'];
  	// Make individual variables for the parts of the date.
  	$variables['date_day'] = format_date($node->created, 'custom', 'j');
  	$variables['date_month'] = format_date($node->created, 'custom', 'M');
  	$variables['date_year'] = format_date($node->created, 'custom', 'Y');

	$variables['content']['field_tags']['#theme'] = 'links';
  
	unset($variables['content']['links']['comment']);
}


function azhagu_preprocess_username(&$variables) {
  
  $account = user_load($variables['account']->uid);
  	
  // See if it has a real_name field and add that as the name instead.
  if (isset($account->field_real_name[LANGUAGE_NONE][0]['safe_value'])) {
    $variables['name'] = $account->field_real_name[LANGUAGE_NONE][0]['safe_value'];
  }
}