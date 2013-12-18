<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Time Date
 *
 * @package			Time Date
 * @version			1.1.0
 * @author			Nathan Doyle <@natetronn>
 * @copyright		Copyright (c) 2013 Cosmos Web Works, LLC
 * @license			MIT  http://opensource.org/licenses/mit-license.php
 * @link			http://github.com/Natetronn/time_date		
 */

/**
 * < EE 2.6.0 backward compat - thx @low
 */
if ( ! function_exists('ee'))
{
	function ee()
	{
		static $EE;
		if ( ! $EE) $EE = get_instance();
		return $EE;
	}
}

class Time_date extends Low_variables_type {

	public $info = array(
		'name'		=> 'Time Date',
		'version'	=> '1.1.0'
	);

	public $default_settings = array(
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
		ee()->cp->add_js_script(array('ui' => 'datepicker'));
		ee()->cp->add_js_script(array('ui' => 'slider'));

	
		$input_id = 'time_date_'.$var_id;	
		
		ee()->javascript->output('						
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

	// --------------------------------------------------------------------

	/**
	* Prep variable data for return
	*
	* @param	mixed	$tagdata		The template tagdata.
	* @param	array	$row			Array containing the current variable details. Keys: variable_id, variable_name, variable_data, variable_label, variable_type and variable_settings.
	* @return	string
	*/

	public function display_output($tagdata, $row)
	{
		$format = ee()->TMPL->fetch_param('format');

		//Boolean of whether to use the current member’s timezone for localization (TRUE), or to use GMT (FALSE); or string of PHP timezone to use for the localization
		$localizer = ee()->TMPL->fetch_param('localize');


		if ( ! empty($format))
		{

			if (version_compare(APP_VER, '2.6', '>=')) 
			{
				$date = ee()->localize->string_to_timestamp($row['variable_data']);
				$time_date = ee()->localize->format_date($format, $date, $localizer);
			}
			else 
			{
				$date = ee()->localize->convert_human_date_to_gmt($row['variable_data']);
				$time_date = ee()->localize->decode_date($format, $date, $localizer);
			}

			return $time_date;
		}
		else
		{
			return $row['variable_data'];
		}

	}

}