<?php

namespace Ca\Xml;
use Ca\Xml\Namespace;
use Ca\Xml\Attribute;

class Element
{
	private $_attributes = array();

	private $_attrNameMap = array();


	public function hasAttribute ($name)
	{
		return $this->_getAttributeIndex($name) >= 0;
	}


	public function getAttribute ($name)
	{
		$value = null;
		if ($this->hasAttribute($name))
		{
			$index = $this->_getAttributeIndex($name);
			$attribute = $this->_attributes[$index];
			$value = $attribute->value;
		}

		return $value;
	}


	public function setAttribute ($name, $value, $namespace = '') 
	{
		$parts = explode(':', $name);
		if (count($parts) > 1) list($namespace, $name) = $parts;
		$attribute = new Attribute($name, $value, new Namespace($namespace));

		if ($this->hasAttribute($attribute->name))
		{
			$index = $this->_getAttributeIndex($attribute->name);
			$this->_attributes[$index] = $attribute;
		}
		else 
		{
			$index = count($this->_attributes);
			array_push($this->_attributes, $attribute);
			$this->_setAttributeIndex($attribute->name, $index);
		}
	}


	private function _getAttributeIndex ($name)
	{
		return isset($this->_attrNameMap[$name]) ? $this->_attrNameMap[$name] : -1;
	}


	private function _setAttributeIndex ($name, $index)
	{
		$this->_attrNameMap[$name] = $index;
	}
}