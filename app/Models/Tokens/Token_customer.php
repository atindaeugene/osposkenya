<?php

namespace App\Models\Tokens;

use CodeIgniter\Model;

/**
 * Token_customer class
 */

class Token_customer extends Token
{

	private $customer_info;

	public function __construct($customer_info = '')
	{
		parent::__construct();
		$this->customer_info = $customer_info;
		$this->CI->sale_lib = new Sale_lib();
	}

	public function token_id()
	{
		return 'CU';
	}

	public function get_value()
	{
		// substitute customer info
		$customer_id = $this->CI->sale_lib->get_customer();
		if($customer_id != -1 && empty($this->customer_info))
		{
			$customer_info = $this->CI->Customer->get_info($customer_id);
			if($customer_info != '')
			{
				return trim($customer_info->first_name . ' ' . $customer_info->last_name);
			}
		}

		return $value;
	}
}
?>