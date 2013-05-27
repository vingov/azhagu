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


function azhagu_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $delimiter = theme_get_setting('breadcrumb_delimiter');

  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
$breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode($delimiter, $breadcrumb) . '</nav>';
    return $output;
  }
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


function azhagu_preprocess_page(&$variables) {
  // Get the entire main menu tree
  $main_menu_tree = menu_tree_all_data('main-menu');

  // Add the rendered output to the $main_menu_expanded variable
  $variables['main_menu_expanded'] = menu_tree_output($main_menu_tree);

}

function azhagu_menu_link(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    // if link class is active, make li class as active too
    if(strpos($output,"active")>0){
        $element['#attributes']['class'][] = "active";
    }
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

