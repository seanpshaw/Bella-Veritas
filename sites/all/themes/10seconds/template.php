<?php

/**
 * Implementation of HOOK_theme().
 */
function 10seconds_theme(&$existing, $type, $theme, $path) {
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
function 10seconds_preprocess(&$vars, $hook) {
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
function 10seconds_preprocess_page(&$vars, $hook) {


  if(module_exists('nice_menus')){
    $vars['nice_primary_links'] = theme_nice_menus_primary_links();
    $vars['nice_secondary_links'] = theme_nice_menus_secondary_links();
  } else {
    $vars['nice_primary_links'] =  theme(array('links__system_main_menu', 'links'), $vars['primary_links'],
      array(
        'id' => 'footer-primary-menu',
        'class' => 'links clearfix',
      ),
      array(
        'text' => t('Footer Primary Menu'),
        'level' => 'h2',
        'class' => 'element-invisible',
      ));
      
    $vars['nice_secondary_links'] =  theme(array('links__system_main_menu', 'links'), $vars['secondary_links'],
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


	
	$vars['path'] = base_path() . path_to_theme();
	$css_path = path_to_theme().'/css/';
	$js_path = path_to_theme() . '/js/';
	$vars['file_path'] = base_path().file_directory_path();
	$vars['default_color'] = theme_get_setting('default_color');
	$vars['url'] = "http://" . $_SERVER['HTTP_HOST'] . url();
    $vars['uri'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
	$vars['tabs2'] = menu_secondary_local_tasks();

	
	// set global for style from cookie if exists
	if( isset( $_COOKIE['10seconds_style'] ) )
		$vars['10seconds_style'] = $_COOKIE['10seconds_style']; 
	else
		$vars['10seconds_style'] = theme_get_setting('color_style');
	
	
  // // populate the header variable
  // 
  // 
  // $enable_ie6_warning = theme_get_setting('enable_ie6_warning');
  // 
  // if ($enable_ie6_warning){
  //  drupal_add_js($js_path.'rokie6warn.js', 'theme');
  // }
  // 
  // 
  // 
  // 
  // drupal_set_html_head(
  //  '<!--[if IE]>   
  //   <script type="text/javascript" src="'.$js_path.'ie_suckerfish.js"></script>
  //   <![endif]-->'
  // );
	
	$vars['scripts'] = drupal_get_js();
	//$vars['scripts'] = "";
	//$vars['head'] = drupal_get_html_head();
	$vars['styles'] = drupal_get_css();

  // 
  // if (strpos(request_uri(), 'wrapper') != false){
  //  $vars['template_file'] = 'page-wrapper';
  // }
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

// function 10seconds_preprocess_node(&$vars, $hook) {
// 	dpm('preprocessing node');
// 	dpm($vars['node']);
// }
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function 10seconds_preprocess_comment(&$vars, $hook) {
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
function 10seconds_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

function 10seconds_add_image(&$vars, $name, $presetname, $path ){
  if(module_exists('theme_imagecache')){
    $vars[$name] = theme_imagecache($presetname, $path, $alt = '', $title = '', $attributes = NULL, $getsize = TRUE) ;
  }
}


function 10seconds_change_theme($change, $changeVal, $page=''){
	
	$theme_settings = variable_get('theme_10seconds_settings', array());
	
	$cookie_prefix = "10seconds_";
  // $cookie_time = time()+31536000;
  $cookie_time = time()+10; 
	//print_r($theme_settings);
		
	if($change && $changeVal){
		//print $change . " " . $changeVal;
		
		switch ($change){
			
			
			case 'tstyle':
			
				$cookie_name = $cookie_prefix . "style";
				setcookie($cookie_name, $changeVal, $cookie_time);
				//$color_style = $theme_settings['color_style'];
				//$theme_settings['color_style'] = $changeVal;
			
			break;

		}
		
	}
	
	 //print_r($theme_settings);
	if ($page){
		drupal_goto("node/$page");
	}
	else {
		drupal_goto('<front>');
	}
	
}
