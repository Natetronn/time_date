<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Time Date
 *
 * @package			Time Date
 * @version			1.0.0
 * @author			Nathan Doyle <@natetronn>
 * @copyright		Copyright (c) 2013 Cosmos Web Works, LLC
 * @license			MIT  http://opensource.org/licenses/mit-license.php
 * @link			http://github.com/Natetronn/timedate		
 */

class Time_date extends Low_variables_type {

	var $info = array(
		'name'		=> 'Time Date',
		'version'	=> '1.0'
	);

	var $default_settings = array(
		'multiple'	=> 'n',
		'options'	=> '',
		'separator'	=> 'newline'
	);

	public $assets = array(
		'css' => 'css/jquery-ui-timepicker-addon.css',
		'js'  => array(
					'js/jquery-ui-timepicker-addon.js',
					'js/jquery-ui-sliderAccess.js'
		)
	);

	// --------------------------------------------------------------------

	/**
	* Display settings sub-form for this variable type
	*
	* @param	mixed	$var_id			The id of the variable: 'new' or numeric
	* @param	array	$var_settings	The settings of the variable
	* @return	array	
	*/
	function display_settings($var_id, $var_settings)
	{
		return array();
	}

	// --------------------------------------------------------------------

	/**
	* Display date time input field
	*
	* @param	int		$var_id			The id of the variable
	* @param	string	$var_data		The value of the variable
	* @param	array	$var_settings	The settings of the variable
	* @return	string
	*/
	function display_input($var_id, $var_data, $var_settings)
	{
		$this->EE->cp->add_js_script(array('ui' => 'datepicker'));
		$this->EE->cp->add_js_script(array('ui' => 'slider'));

	
		$input_id = 'time_date_'.$var_id;	
		
		$this->EE->javascript->output('						
			$("#'.$input_id.'").datetimepicker({ampm: true, timeFormat: \'h:mm TT\', dateFormat: $.datepicker.W3C});
		');
		
		return form_input(array(
			'name' => "var[{$var_id}]",
			'value' => $var_data,
			'id' => $input_id,
		));		
	}

	// --------------------------------------------------------------------

	/**
	* Prep variable data for saving
	*
	* @param	int		$var_id			The id of the variable
	* @param	mixed	$var_data		The value of the variable, array or string
	* @param	array	$var_settings	The settings of the variable
	* @return	string
	*/
	function save_input($var_id, $var_data, $var_settings)
	{
		return $var_data;	// just save it as is
	}

}