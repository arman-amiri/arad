<?php


namespace App\Http\Requests\Auth;


trait GetRegisterFieldAndValue

{
	public function getFiledName()
	{
		return $this->has('email') ? 'email' : 'mobile';
	}

	public function getFieldValue()
	{
		$field = $this->getFiledName();
		$value = $this->input($field);
		if ($field === 'mobile')
		{
			$value = to_valid_mobile_number($value);
		}
		return $value;
	}
}