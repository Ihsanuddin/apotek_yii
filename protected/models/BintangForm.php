<?php
class BintangForm extends CFormModel
{
	public $length;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// length are required
			array('length', 'required'),
		);
	}
}

?>