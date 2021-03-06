<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// include config file
include (PATH_THIRD.'pagination_p0_fixer/config.php');
/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Pagination P0 fixer Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		John Morton
 * @link		http://supergeekery.com
 */

$plugin_info = array(
	'pi_name'			=> $config['name'],
	'pi_version'		=> $config['version'],
	'pi_author'			=> 'John Morton',
	'pi_author_url'		=> 'http://supergeekery.com',
	'pi_description'	=> 'Remove "P0" at the end of EE pagination links',
	'pi_usage'			=> Pagination_p0_fixer::usage()
);


class Pagination_p0_fixer {

	public $return_data;
    
	/**
	 * Constructor
	 */
	public function __construct($theurl='')
	{
		$this->EE =& get_instance();
	
		if ($theurl == '')
	    {
	      $theurl = $this->EE->TMPL->tagdata;
	    }

		$removetrailingslash = $this->EE->TMPL->fetch_param('removetrailingslash');
		if ($removetrailingslash == 'yes' || $removetrailingslash == 'true')
		{
			$patterns = '{\/P0$}';
		} else {
			$patterns = '{P0$}';
		}
		$replacements = '';
		$this->return_data = preg_replace($patterns, $replacements, $theurl);
		return $this->return_data;
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>

Wrap {exp:pagination_p0_fixer}{/exp:pagination_p0_fixer} around the {auto_path} variable that is part of the built-in ExpressionEngine pagination function.

If "/P0" is at the end of that URL, it will remove the 'P0' from the URL. 

You can add the "removetrailingslash" parameter like this "{exp:pagination_p0_fixer removetrailingslash='true'}" to eliminate the trailing slash if you prefer.

Usage example:

{exp:pagination_p0_fixer removetrailingslash='true'}{auto_path}{/exp:pagination_p0_fixer}

Note: There are no spaces or any extra characters beyond the {auto_path} between the opening and closing tags.

<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.pagination_p0_fixer.php */
/* Location: /system/expressionengine/third_party/pagination_p0_fixer/pi.pagination_p0_fixer.php */