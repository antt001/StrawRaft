<?php
/**
 *
 * @Singleton validator class
 *
 * @copyright (c) 2010 Antt
 * @
 * @version 0.0.2
 * @license MIT http://www.opensource.org/licenses/mit-license.php
 * @filesource
 * @package StrawRaft
 *
 */
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

class validator
{
	/*
	 * @var array $errors; 
	 */
	public $errors = array();

	/*
	* @var object $instance
	*/
	private static $instance = null;

	/**
	 *
	 * Return Config instance or create intitial instance
	 *
	 * @access public
	 *
	 * @return object
	 *
	 */
	public static function getInstance()
	{
 		if(is_null(self::$instance))
 		{
 			self::$instance = new validator;
 		}
		return self::$instance;
	}


	/**
	 *
	 * @the constructor is set to private so
	 * @so nobody can create a new instance using new
	 *
	 */
	private function __construct()
	{
		
	}

	/**
	 * @validate text en,he letters and _
	 *
	 * @access public
	 *
	 * @param string $value Validation value
	 *
	 * @param string $description Error message
	 *
	 * @return bool
	 *
	 */
	public function validateTextOnly($value, $description = ''){
	$pattern ='/^[a-zA-Z0-9_\x{5D0}-\x{5EA}]*$/u';
	

	if (preg_match($pattern, $value)) {		
			return true;
		}else{
			$this->errors[] = $description;
			return false; 
		}
	}
	
	/**
	 * @validate that input is not empty
	 *
	 * @access public
	 *
	 * @param string $value Validation value
	 *
	 * @param string $min_len minimual leght of value
	 *
	 * @param string $description Error description
	 *
	 * @return bool
	 *
	 */
	public function validateNotEmpty($value, $min_len = 0, $description = ''){
		if (strlen(trim($value)) > $min_len) {
			return true;
		}else{
			$this->errors[] = $description;
			return false;
		}
	}


        /**
         * @listErrors returns a string containing a list of errors found,
	 * @Seperated by a given deliminator
         *
         * @param string $delim error separator
         *
	 * @return string list of errors
	 *
	 */
	public function listErrors($delim = ' '){
		return implode($delim,$this->errors);
	}

        /**
         * @clearErrors resets the error array
         *
	 * @return void
	 *
	 */
	public function clearErrors(){
		$errors = array();
	}

        /**
         * @Manually add something to the list of errors
         *
         * @param string $description the error strin
         *
	 * @return void
	 *
	 */
	public function addError($description){
		$this->errors[] = $description;
	}

        /**
         * @Check whether any errors have been found
         * (i.e. validation has returned false)
         *
         * @return bool 
         */
	function foundErrors() {
		if (count($this->errors) > 0){
			return true;
		}else{
			return false;
		}
	}


	/**
	 *
	 * @__clone
	 *
	 * @access private
	 *
	 */
	private function __clone()
	{
	}
}