<?php
/**
* --------------------------------------------------------------------------------------------------
* 
* Helper Template
*
* Gathers functions related with application template.
*
* These functions are aliases to the same method names of template library.
*
* @example	// Function of this helper	
*			example_function();
*
*			// Equivalent call
* 			$this->template->example_function();
* 
* @since 	15/07/2013
*
* --------------------------------------------------------------------------------------------------
*/

/**
* message()
* Returns the HTML of a message according with forwarded parameters.
* @param string type 	// danger|error, warning, info, success, note, primary, default
* @param string title
* @param string description
* @param boolean close
* @param string style
* @return string html
*/
function message($type = 'info', $title = '', $description = '', $close = false, $style = '')
{
	$CI =& get_instance();
	return $CI->template->message($type, $title, $description, $close, $style);
}

/**
* image()
* Returns the HTML component image, which is responsible for building an img tag, also 
* checking if the given value is a font-awesome icon.
* @param string url_img
* @return string html
*/
function image($url_img = '')
{
	$CI =& get_instance();
	return $CI->template->image($url_img);
}

/**
* app_settings_inputs()
* Returns a set of HTML hidden inputs, each one for each app setting as APP_NAME, TEMPLATE, etc.
* @return string html
*/
function app_settings_inputs()
{
	$CI =& get_instance();
	return $CI->template->app_settings_inputs();
}

/**
* load_html_component()
* Loads a HTML component, located at 
* application/views/TEMPLATE/_includes/html_components/$component/$component.php
* The second parameter is all variables must be available inside this component.
* @param string component
* @param array params
* @return string html
*/
function load_html_component($component = '', $params = array())
{
	$CI =& get_instance();
	return $CI->template->load_html_component($component, $params);
}

/**
* load_js_file()
* Returns the HTML of tag <script src="$file"> according the forwarded file. It is
* necessary only the file name. 
* @param string file
* @return string html
*/
function load_js_file($file = '')
{
	$CI =& get_instance();
	return $CI->template->load_js_file($file);
}

/**
* load_css_file()
* Returns the HTML of tag <link href="$file"> according the forwarded file. It is
* necessary only the file name. 
* @param string file
* @return string html
*/
function load_css_file($file = '')
{
	$CI =& get_instance();
	return $CI->template->load_css_file($file);
}