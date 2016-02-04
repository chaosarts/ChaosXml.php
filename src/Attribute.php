<?php 

namespace Ca\Xml;
use Ca\Xml\Namespace;

/**
 * Class to represent xml attributes
 * @property string $name
 * @property string $value
 * @property Namespace $namespace
 */
class Attribute
{
	/**
	 * @var string
	 */
	private $_name;

	/**
	 * @var string
	 */
	private $_value;

	/**
	 * @var Namespace
	 */
	private $_namespace;


	/**
	 * Magic method
	 */
	public function __get ($name)
	{
		$value = null;
		$method = 'get' . ucfirst($name);
		if (method_exists($this, $method))
			$value = call_user_func(array($this, $method))
		return $value;
	}


	/**
	 * Magic method
	 */
	public function __set ($name, $value)
	{
		$method = 'set' . ucfirst($name);
		if (method_exists($this, $method))
			call_user_func(array($this, $method), $value);
	}


	/**
	 * Creates a new Attribute object
	 * @param string $name The name of th attribute
	 * @param string $value The value of the attribute
	 * @param Namespace $namespace The namespace of the attribute
	 */
	public function __construct ($name, $value, Namespace $namespace = null)
	{
		$this->_name = $name;
		$this->_value = $value;
		$this->_namespace = $namespace;
	}


	/**
	 * Returns the attribute in its string representation
	 * @return string
	 */
	public function __toString ()
	{
		return sprintf('%s%s="%s"', $this->_namespace, $this->_name, $this->_value);
	}


	/**
	 * Returns the name of the attribute
	 * @return string
	 */
	public function getName () 
	{
		return $this->_name;
	}


	/**
	 * Returns the value of the attribute
	 * @return string
	 */
	public function getValue () 
	{
		return $this->_value;
	}


	/**
	 * Returns the namespace of the attribute
	 * @return Namespace
	 */
	public function getNamespace () 
	{
		return $this->_namespace;
	}


	/**
	 * Sets the value of the attribute
	 * @param string $value
	 * @return Attribute
	 */
	public function setValue ($value)
	{
		$this->_value = $value;
		return $this;
	}


	/**
	 * Sets the namespace of the attribute
	 * @param Namespace $namespace
	 * @return Attribute
	 */
	public function setNamespace (Namespace $namespace)
	{
		$this->_namespace = $namespace;
		return $this;
	}
}