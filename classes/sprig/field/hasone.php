<?php defined('SYSPATH') or die('No direct script access.');

class Sprig_Field_HasOne extends Sprig_Field_ForeignKey {

	public function __construct(array $options = NULL)
	{
		parent::__construct($options);

		if ($this->choices === NULL)
		{
			$this->choices = Sprig::factory($this->model)->select_list();
		}
	}
	
	public function __toString()
	{
		return $this->choices[$this->value];
	}

	public function set($value)
	{
		if ($value instanceof Sprig)
		{
			$value = $value->{$value->pk()};
		}

		return parent::set($value);
	}

	public function input($name, array $attr = NULL)
	{
		return form::select($name, $this->choices, $this->value);
	}

} // End Sprig_Field_HasOne
