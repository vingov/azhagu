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
  
  unset($variables['content']['links']['node']['#links']['node-readmore']);

  unset($variables['content']['links']['comment']);

  // Let's get that read more link out of the generated links variable!
  unset($variables['content']['links']['node']['#links']['node-readmore']);

// Now let's put it back as it's own variable! So it's actually versatile!
    $variables['newreadmore'] = t('<footer> <a href="!title">Read More</a> </footer>',
      array(
        '!title' => $variables['node_url'],
      )
  );

}


function azhagu_preprocess_username(&$variables) {
  
  $account = user_load($variables['account']->uid);
  	
  // See if it has a real_name field and add that as the name instead.
  if (isset($account->field_real_name[LANGUAGE_NONE][0]['safe_value'])) {
    $variables['name'] = $account->field_real_name[LANGUAGE_NONE][0]['safe_value'];
  }
}


function azhagu_preprocess_pager(&$variables, $hook) {

  //Removing the first & last from the pager
  if ($variables['quantity'] > 5) $variables['quantity'] = 5;
  $variables['tags'][0] = FALSE;
  $variables['tags'][4] = FALSE;
}

function azhagu_preprocess_comment(&$variables) {
  $comment = $variables['elements']['#comment'];
  $node = $variables['elements']['#node'];
  $variables['created']   = format_date($comment->created, 'custom', 'l, d/m/Y');
  $variables['changed']   = format_date($comment->changed, 'custom', 'l, d/m/Y');

  $variables['submitted'] = t('Submitted by !username on !datetime', array('!username' => $variables['author'], '!datetime' => $variables['created']));
}

