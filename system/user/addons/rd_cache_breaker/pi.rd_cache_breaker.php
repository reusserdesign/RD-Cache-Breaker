<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * RD Cache Breaker
 * 
 * @package		ExpressionEngine
 * @category	Plugin
 * @author		Jarrod D Nix, Reusser Design
 * @license		https://opensource.org/licenses/MIT The MIT License (MIT)
 */

class Rd_cache_breaker
{

	public $return_data = "";
	
	// --------------------------------------------------------------------

	/**
	 * RD Cache Breaker
	 *
	 * This function appends the last modified time (unix timestamp) to the specified file
	 *
	 * @access  public
	 * @return  string
	 */
	public function __construct()
	{

		$return = '';

		if (version_compare(APP_VER, '3', '>='))
		{
			$file		= ee()->TMPL->fetch_param('file') ? ee()->TMPL->fetch_param('file') : FALSE;
			$separator	= ee()->TMPL->fetch_param('separator') ? ee()->TMPL->fetch_param('separator') : "?";

			if($file && file_exists($_SERVER['DOCUMENT_ROOT'].$file)) {
				$return = $file;
				$time = filemtime($_SERVER['DOCUMENT_ROOT'].$file);
				if ($time !== FALSE)
				{
					$return .= $separator . $time;
				}
			}
		}

		$this->return_data = $return;

	}

}


/* End of file pi.rd_cache_breaker.php */
/* Location: ./system/user/addons/rd_cache_breaker/pi.rd_cache_breaker.php */
