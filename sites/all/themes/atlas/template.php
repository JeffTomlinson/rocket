<?php

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
function atlas_preprocess_maintenance_page(&$vars, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  // atlas_preprocess_html($variables, $hook);
  // atlas_preprocess_page($variables, $hook);

  // This preprocessor will also be used if the db is inactive. To ensure your
  // theme is used, add the following line to your settings.php file:
  // $conf['maintenance_theme'] = 'atlas';
  // Also, check $vars['db_is_active'] before doing any db queries.
}

/**
 * Implements hook_modernizr_load_alter().
 *
 * @return
 *   An array to be output as yepnope testObjects.
 */
/* -- Delete this line if you want to use this function
function atlas_modernizr_load_alter(&$load) {

}

/**
 * Implements hook_preprocess_html()
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/**
 * Implements hook_preprocess_html()
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function atlas_preprocess_html(&$vars) {
  // Strip out core's sidebar body classes, they are wonky.
  $vars['classes_array'] = array_diff($vars['classes_array'], array(
    'two-sidebars',
    'one-sidebar sidebar-first',
    'one-sidebar sidebar-second',
    'no-sidebars',
  ));
  
  $sidebar_first = $vars['page']['sidebar_first'];
  $sidebar_last = $vars['page']['sidebar_last'];
  
  switch (TRUE) {
    case !empty($sidebar_first) && !empty($sidebar_last):
      $vars['classes_array'][] = 'both-sidebars';
      break;
    
    case !empty($sidebar_first):
      $vars['classes_array'][] = 'sidebar-first';
      break;
    
    case !empty($sidebar_last):
      $vars['classes_array'][] = 'sidebar-last';
      break;
    
    default:
      $vars['classes_array'][] = 'no-sidebars';
  }
  
  // Get sidebars configuration from theme settings.
  $vars['classes_array'][] = theme_get_setting('atlas_sidebars');
  
  //$viewport = array(
  //  '#tag' => 'meta',
  //  '#attributes' => array(
  //    'name' => 'viewport',
  //    'content' => 'width=device-width',
  //  ),
  //);
  //
  //drupal_add_html_head($viewport, 'viewport');
  
  $html_head = array(
    'viewport' => array(
      '#tag' => 'meta',
      '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width',
      ),
    ),
    //'favicon' => array(
    //  '#tag' => 'link',
    //  '#attributes' => array(
    //  'rel' => 'shortcut icon',
    //  'href' => '/sites/all/themes/wl_corona/images/favicon.png',
    //  ),
    //),
    //'apple-mobile-web-app-capable' => array(
    //  '#tag' => 'meta',
    //  '#attributes' => array(
    //  'name' => 'apple-mobile-web-app-capable',
    //  'content' => 'yes',
    //  ),
    //),
    //'apple-mobile-web-app-status-bar-style' => array(
    //  '#tag' => 'meta',
    //  '#attributes' => array(
    //  'name' => 'apple-mobile-web-app-status-bar-style',
    //  'content' => 'black',
    //  ),
    //),
    //'apple-touch-icon' => array(
    //  '#tag' => 'link',
    //  '#attributes' => array(
    //  'rel' => 'apple-touch-icon',
    //  'href' => '/apple-touch-icon.png',
    //  ),
    //),
    //'apple-mobile-web-app-title' => array(
    //  '#tag' => 'meta',
    //  '#attributes' => array(
    //  'name' => 'apple-mobile-web-app-title',
    //  'content' => 'Wallin & Luna',
    //  ),
    //),
  );
  
  foreach ($html_head as $key => $data) {
    drupal_add_html_head($data, $key);
  }
}

/**
 * Override or insert variables into the page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_page(&$vars) {

}

/**
 * Override or insert variables into the region templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_region(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_block(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the entity template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("entity" in this case.)
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_entity(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the node template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_node(&$vars, $hook) {
  $node = $vars['node'];
}
// */

/**
 * Override or insert variables into the field template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("field" in this case.)
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_field(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the comment template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_comment(&$vars, $hook) {
  $comment = $vars['comment'];
}
// */

/**
 * Override or insert variables into the views template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function atlas_preprocess_views_view(&$vars) {
  $view = $vars['view'];
}
// */


/**
 * Override or insert css on the site.
 *
 * @param $css
 *   An array of all CSS items being requested on the page.
 */
/* -- Delete this line if you want to use this function
function atlas_css_alter(&$css) {

}
// */

/**
 * Override or insert javascript on the site.
 *
 * @param $js
 *   An array of all JavaScript being presented on the page.
 */
/* -- Delete this line if you want to use this function
function atlas_js_alter(&$js) {

}
// */
