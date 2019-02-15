<?php

namespace App;

class CreditCard
{
    private $_number;
    
    private $_error;

	public function _check_length($length,$category)
	{
		if ($category == 0) {
            return (($length == 13) || ($length == 16));
        } elseif ($category == 1) {
            return (($length == 16) || ($length == 18) || ($length == 19));
        } elseif ($category == 2) {
            return ($length == 16);
        } elseif ($category == 3) {
            return ($length == 15);
        } elseif ($category == 4) {
            return ($length == 14);
        } else {
            return 1;
        }
	}
    
    public function IsValid($number = NULL)
	{
		if (!is_null($number)) {
			$this->_number  = NULL;
			$this->_error   = 'ERROR_NOT_SET';
			$k = strlen($number);
			$value = '';
			for ($i = 0; $i < $k; $i++) {
				$c = $number[$i];
				if (ctype_digit($c)) {
                    $value .= $c;
                }
				elseif (!ctype_space($c) && !ctype_punct($c)) {
					$this->_error = 'ERROR_INVALID_CHAR';
					break;
				}
			}
			$number = $value;
			if($number[0] == '4') { 
                $lencat = 2;
            } elseif ($number[0] == '5') {
                $lencat = 2;
            } elseif ($number[0] == '3') {
                $lencat = 4;
            } elseif ($number[0] == '2') {
                $lencat = 3;
            }
			if (!$this->_check_length(strlen($number),$lencat)) {
				$this->_error  = 'ERROR_INVALID_LENGTH';
			} else {
				$this->_number = $number;
				$this->_error  = true;
			}
		} else {
			$this->_error = 'ERROR_INVALID_CHAR';
		}
		return $this->_error;
    }
    
	public function Set($number = NULL)
	{
		if (!is_null($number)) {
            return $this->IsValid($number);
        }
		$this->_number  = NULL;
		$this->_error   = 'ERROR_NOT_SET';
		return 'ERROR_NOT_SET';
    }
    
    public function Get()
	{
        return $this->_number;
    }
}