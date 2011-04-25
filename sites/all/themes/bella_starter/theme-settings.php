<?php
// $Id: theme-settings.php,v 1.7 2008/09/11 09:36:50 johnalbin Exp $

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'zen') . '/theme-settings.php';


/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array.
 */
function bella_starter_settings($saved_settings) {
  if(module_exists('devel')){
    dpm('saved settings');
    dpm($saved_settings);
  }
  // Get the default values from the .info file.
  $defaults = zen_theme_get_default_settings('bella_starter');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  /*
   * Create the form using Forms API: http://api.drupal.org/api/6
   */
  $form = array();
  
  $form['contact'] = array(
     '#type' => 'fieldset',
     '#title' => t('Contact Settings'),
     '#collapsed' => FALSE,
     '#collapsible' => TRUE,
     '#weight' => -90
   );

  $form['contact']['phone_fax'] = array(
     '#type' => 'fieldset',
     '#title' => t('Phone and Fax'),
   );
  
  $form['contact']['phone_fax']['bella_starter_phone'] = array(
    '#type' => 'textfield',
    '#title' => t('Phone Number'),
	  '#default_value' => $settings['bella_starter_phone'],
  );

  $form['contact']['phone_fax']['bella_starter_fax'] = array(
    '#type' => 'textfield',
    '#title' => t('Fax Number'),
	  '#default_value' => $settings['bella_starter_fax'],
  );

  $form['contact']['address'] = array(
    '#type' => 'fieldset',
    '#title' => t('Address'),
  );

  $form['contact']['address']['bella_starter_street1'] = array(
    '#type' => 'textfield',
    '#title' => t('Street Address 1'),
	  '#default_value' => $settings['bella_starter_street1'],
  );
  $form['contact']['address']['bella_starter_street2'] = array(
    '#type' => 'textfield',
    '#title' => t('Street Address 2'),
	  '#default_value' => $settings['bella_starter_street2'],
  );
  $form['contact']['address']['bella_starter_city'] = array(
    '#type' => 'textfield',
    '#title' => t('City'),
	  '#default_value' => $settings['bella_starter_city'],
  );
  $form['contact']['address']['bella_starter_state'] = array(
    '#type' => 'textfield',
    '#title' => t('State'),
    '#size' => 2,
    '#maxlength' => 2,
	  '#default_value' => $settings['bella_starter_state'],
  );
  $form['contact']['address']['bella_starter_zip'] = array(
    '#type' => 'textfield',
    '#title' => t('Zip code'),
    '#size' => 10,
    '#maxlength' => 10,
	  '#default_value' => $settings['bella_starter_zip'],
  );
  
  $form['contact']['link'] = array(
     '#type' => 'fieldset',
     '#title' => t('Website link'),
   );

   $form['contact']['link']['bella_starter_link_title'] = array(
     '#type' => 'textfield',
     '#title' => t('Link title'),
 	  '#default_value' => $settings['bella_starter_link_title'],
   );

   $form['contact']['link']['bella_starter_link_url'] = array(
     '#type' => 'textfield',
     '#title' => t('Link URL'),
 	  '#default_value' => $settings['bella_starter_link_url'],
 	  '#description' => 'The full URL to use - include the "http://" (e.g. "http://example.com)',
   );
   
   
   $form['theme']['seo'] = array(
      '#type' => 'fieldset',
      '#title' => t('SEO Settings'),
    );

    $form['theme']['seo']['bella_starter_seo_description'] = array(
      '#type' => 'textarea',
      '#title' => t('SEO Description'),
  	  '#default_value' => $settings['bella_starter_seo_description'],
    );

    $form['theme']['seo']['bella_starter_seo_keywords'] = array(
      '#type' => 'textarea',
      '#title' => t('SEO Keywords'),
  	  '#default_value' => $settings['bella_starter_seo_keywords'],
  	  '#description' => '',
    );
    
    $form['theme']['seo']['bella_starter_seo_google'] = array(
      '#type' => 'textarea',
      '#rows' => 2,
      '#cols' => 30,
      '#title' => t('Google Analytics Tracking Code'),
  	  '#default_value' => $settings['bella_starter_seo_google'],
  	  '#description' => '',
    );

  // Add the base theme's settings.
  $form += zen_settings($saved_settings, $defaults);

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']); // We don't need to select the base stylesheet.

  // Return the form
  return $form;
}
