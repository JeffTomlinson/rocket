<?php
/**
 * Implements hook_form_system_theme_settings_alter() function.
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function atlas_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  // From the always awesome Zen
  if (isset($form_id)) {
   return;
  }

  $theme = isset($form_state['build_info']['args'][0]) ? $form_state['build_info']['args'][0] : '';
  
  $form['atlas'] = array(
    '#type' => 'fieldset',
    '#title' => t('Atlas Settings'),
  );
  
  $form['atlas']['atlas_sidebars'] = array(
    '#type' => 'radios',
    '#title' => t('Sidebars'),
    '#default_value' => theme_get_setting('atlas_sidebars'),
    '#options' => array(
      'sidebars-split' => t('Split'),
      'sidebars-before' => t('First'),
      'sidebars-after' => t('Last'),
    ),
  );
}
