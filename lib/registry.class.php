<?php
/**
 *
 * @Registry class to store
 * @system wide variables
 * 
 * @copyright (c) 2010 Antt
 * @
 * @version 0.0.2
 * @license MIT http://www.opensource.org/licenses/mit-license.php
 * @filesource
 * @package StrawRaft
 * @Based on Kevin Waterson PHPRO.ORG
 *
 */
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

Class Registry {

 /*
 * @the vars array
 * @access private
 */
 private $vars = array();


 /**
 *
 * @set undefined vars
 *
 * @param string $index
 *
 * @param mixed $value
 *
 * @return void
 *
 */
 public function __set($index, $value)
 {
	$this->vars[$index] = $value;
 }

 /**
 *
 * @get variables
 *
 * @param mixed $index
 *
 * @return mixed
 *
 */
 public function __get($index)
 {
	return $this->vars[$index];
 }

}

?>
