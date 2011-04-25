<?php
// $Id: template.php,v 1.21 2009/08/12 04:25:15 johnalbin Exp $

/**
 * Contextually adds 960 Grid System classes.
 *
 * The first parameter passed is the *default class*. All other parameters must
 * be set in pairs like so: "$variable, 3". The variable can be anything available
 * within a template file and the integer is the width set for the adjacent box
 * containing that variable.
 *
 *  class="<?php print ns('grid-16', $var_a, 6); ?>"
 *
 * If $var_a contains data, the next parameter (integer) will be subtracted from
 * the default class. See the README.txt file.
 */
function ns() {
  $args = func_get_args();
  $default = array_shift($args);
  // Get the type of class, i.e., 'grid', 'pull', 'push', etc.
  // Also get the default unit for the type to be procesed and returned.
  list($type, $return_unit) = explode('-', $default);

  // Process the conditions.
  $flip_states = array('var' => 'int', 'int' => 'var');
  $state = 'var';
  foreach ($args as $arg) {
    if ($state == 'var') {
      $var_state = !empty($arg);
    }
    elseif ($var_state) {
      $return_unit = $return_unit - $arg;
    }
    $state = $flip_states[$state];
  }

  $output = '';
  // Anything below a value of 1 is not needed.
  if ($return_unit > 0) {
    $output = $type . '-' . $return_unit;
  }
  return $output;
}

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to bella_starter_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: bella_starter_breadcrumb()
 *
 *   where bella_starter is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Implementation of HOOK_theme().
 */
function bella_starter_theme(&$existing, $type, $theme, $path) {

	$hooks = array();
  $hooks = zen_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function bella_starter_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function bella_starter_preprocess_page(&$vars, $hook) {
  
  if (module_exists('google_fonts_per_theme')) {
	  _google_fonts_per_theme_page_alter($vars);
	}
  
  if(module_exists('nice_menus')){
    $vars['main_menu'] = !empty($vars['primary_links']) ? theme_nice_menus_primary_links() : '';
    $vars['secondary_menu'] = !empty($vars['secondary_links']) ? theme_nice_menus_secondary_links() : '';

  } else {
    $vars['main_menu'] =  theme(array('links__system_main_menu', 'links'), $vars['primary_links'],
      array(
        'id' => 'footer-primary-menu',
        'class' => 'links clearfix',
      ),
      array(
        'text' => t('Footer Primary Menu'),
        'level' => 'h2',
        'class' => 'element-invisible',
      ));
      
      $vars['secondary_menu'] =  theme(array('links__system_main_menu', 'links'), $vars['secondary_links'],
        array(
          'id' => 'footer-secondary-menu',
          'class' => 'links clearfix',
        ),
        array(
          'text' => t('Footer Secondary Menu'),
          'level' => 'h2',
          'class' => 'element-invisible',
        ));
  }

  $vars['regular_primary_links'] =  theme(array('links__system_main_menu', 'links'), $vars['primary_links'],
    array(
      'id' => 'footer-primary-menu',
      'class' => 'links clearfix',
    ),
    array(
      'text' => t('Footer Primary Menu'),
      'level' => 'h2',
      'class' => 'element-invisible',
    ));

  $vars['regular_secondary_links'] =  theme(array('links__system_main_menu', 'links'), $vars['secondary_links'],
    array(
      'id' => 'footer-secondary-menu',
      'class' => 'links clearfix',
    ),
    array(
      'text' => t('Footer Secondary Menu'),
      'level' => 'h2',
      'class' => 'element-invisible',
    ));
  
  $scm_link = l('Sean Shaw', 'http://www.seanpshaw.com', array('attributes' => array('target' => '_blank')));		
	$vars['credits'] = "Design & Development by Sean Shaw";
  
  global $theme_key;
  $settings = theme_get_settings($theme_key);
  
  $vars['address_raw'] = _get_address_from_settings($settings);
  
  $vars['phone'] = !empty($settings['bella_starter_phone']) ? $settings['bella_starter_phone'] : '';  


  $l = '';

  if (!empty($settings['bella_starter_link_url'])){
    $title = '';
    if(!empty($settings['bella_starter_link_title'])){
      $title = $settings['bella_starter_link_title'];
    } else {
      $title = $settings['bella_starter_link_url'];
    }
    $link = l($title, $settings['bella_starter_link_url'], array('attributes' => array('target' => '_blank')));
    $l = '<div id="site-link">' . $link . '</div>';
  } 
  
  $vars['link'] = $l;
  
  $vars['seo_keywords'] = !empty($settings['bella_starter_seo_keywords']) ? $settings['bella_starter_seo_keywords'] : '';
  $vars['seo_description'] = !empty($settings['bella_starter_seo_description']) ? $settings['bella_starter_seo_description'] : '';
  $vars['ga_tracking_code'] = !empty($settings['bella_starter_seo_google']) ? $settings['bella_starter_seo_google'] : '';

  $vars['color_style'] = !empty($settings['color_style']) ? $settings['color_style'] : '';
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

// function bella_starter_preprocess_node(&$vars, $hook) {
// 	dpm('preprocessing node');
// 	dpm($vars['node']);
// }
// */


function _get_address_from_settings( $settings) {
  $out = '';
  if (!empty($settings['bella_starter_street1']))     $out .= $settings['bella_starter_street1'];
  if (!empty($settings['bella_starter_street2']))     $out .= ''. $settings['bella_starter_street2'];
  if ($out && (!empty($settings['bella_starter_city']) || !empty($settings['bella_starter_state']) || !empty($settings['bella_starter_zip']))) $out .= '';
  if (!empty($settings['bella_starter_city']))        $out .= $settings['bella_starter_city'] .', ';
  if (!empty($settings['bella_starter_state']))       $out .= $settings['bella_starter_state'] .' ';
  if (!empty($settings['bella_starter_zip']))       $out .= $settings['bella_starter_zip'];
  return $out;
  
}

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function bella_starter_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
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
function bella_starter_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */
