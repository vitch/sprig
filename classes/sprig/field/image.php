<?php defined('SYSPATH') or die('No direct script access.');

class Sprig_Field_Image extends Sprig_Field_Char 
{
	
	/**
	 * @const string Image will be cropped to the passed size (via Image->crop);
	 */
	const RESIZE_TYPE_CROP = 'RESIZE_TYPE_CROP';
	/**
	 * @const string Image will be resized to fit in the passed size (via Image->resize);
	 */
	const RESIZE_TYPE_FIT = 'RESIZE_TYPE_FIT';
	/**
	 * @const string Image will be resized and cropped to fit exactly in the passed size
	 * while retaining as much of the image as possible (via Image->resizeAndCrop);
	 */
	const RESIZE_TYPE_EXACT_FIT = 'RESIZE_TYPE_EXACT_FIT';
	/**
	 * @const string Image will not be cropped or resized at all and an Exception will
	 * be thrown if the uploaded image isn't the correct size.
	 */
	const RESIZE_TYPE_EXACT = 'RESIZE_TYPE_EXACT';
	/**
	 * @const string Image will not be cropped or resized at all
	 */
	const RESIZE_TYPE_NONE = 'RESIZE_TYPE_NONE';
	
	/**
	 * @var  integer  image width
	 */
	public $width;
	/**
	 * @var  integer  image height
	 */
	public $height;
	/**
	 * @var  string  path where the image will be saved to/ loaded from
	 */
	public $path;
	/**
	 * @var  string one of the RESIZE_TYPE_* constants
	 */
	public $resize_type;

	public function input($name, array $attr = array())
	{
		$attr['type'] = 'file';
		$r = Form::input($name, '', $attr);
		if ($this->value != '') {
			$r .= HTML::image($this->path . $this->value);
		}
		return $r;
	}
	
	public function verbose()
	{
		// TODO: Include an option to display the image on listings pages?
		//return HTML::image($this->path . $this->value);
		return $this->value == '' ? '' : '/' . $this->path . $this->value;
	}

} // End Sprig_Field_Image
