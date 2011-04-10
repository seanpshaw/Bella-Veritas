<?php

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'bella_starter') . '/theme-settings.php';

/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array.
 */
function tenseconds_settings($saved_settings) {

  // Get the default values from the .info file.
    $defaults = zen_theme_get_default_settings('tenseconds');
  // 
  //   // Merge the saved variables and their default values.
    $settings = array_merge($defaults, $saved_settings);
  // 
  //   /*
  //    * Create the form using Forms API: http://api.drupal.org/api/6
  //    */
    $form = array();
    $form += bella_starter_settings($settings);
    
    
    $options = array(
          'triangles' => 'Triangles',  
  			  'brownstone' => 'Brownstone',
  			  'charcoal' => 'Charcoal',
  			  'columns' => 'Columns',
          'glossy' => 'Glossy',
          'handyman' => 'Handyman',        
          'industrial' => 'Industrial' ,        
          'steel' => 'Steel',
          'landscaped' => 'Landscaped',
          'metal' => 'Metal',
          'minimalist' => 'Minimalist',
          'ornate' => 'Ornate',
          'pastel' => 'Pastel',
          'paint_splatter' => 'Paint Splatter',
          'professional' => 'Professional',
          'scrapbook' => 'Scrapbook',
          'stethoscope' => 'Stethoscope',
          'summer_grass' => 'Summer Grass',
					'politic' => 'Politic',
					'adorned' => 'Adorned',
					'sunset' => 'Sunset',
    );
    ksort($options);
    
  $form['theme']['color_style'] = array(
      '#type' => 'select',
      '#title' => t('Default Color Style'),
   '#options' => $options,
  '#default_value' => $saved_settings['color_style'],
    );
  
  // Add the base theme's settings.

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']); // We don't need to select the base stylesheet.

  // Return the form
  return $form;
}
