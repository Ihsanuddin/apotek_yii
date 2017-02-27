<?php
class CsvForm extends CFormModel
{
	public $csv;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// length are required
			array('csv', 'required'),
		);
	}
}

?>