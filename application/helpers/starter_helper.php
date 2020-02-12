<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getConfigEl'))
{
	function getConfigEl($var)
	{
		$config = config_item($var);
		return $config;
	}
}
