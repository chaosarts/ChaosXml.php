<?php

namespace Ca\Xml;


class Namespace 
{
	private $_name;


	/**
	 * Return readonly 
	 * @return mixed
	 */
	public function __get ($name) 
	{
		switch ($name)
		{
			case 'name':
				$varname = '_' . $name;
				return $this->{$varname};
			default:
				return false;
		}
	}

	public function __construct ($name = '')
	{
		$this->_name = $name;
	}


	public function __toString ()
	{
		return ($this->isEmpty()) ? '' : $this->_name . ':';
	}


	public function isEmpty ()
	{
		return $this->_name == '';
	}
}