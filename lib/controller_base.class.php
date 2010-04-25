<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

Abstract Class baseController {

/*
 * @registry object
 */
protected $registry;

protected $_cookie_expire;

function __construct($registry) {
	$this->registry = $registry;
        $this->_cookie_expire = config::getInstance()->config_values['application']['cookie_expire'];
}

/**
 *
 * @set session vars
 *
 * @param string $index
 *
 * @param mixed $value
 *
 * @return void
 *
 */
 public function sessionSet($index, $value)
 {
	$_SESSION[$index] = $value;
        setcookie($index, $value, time()+$this->_cookie_expire);
 }

 /**
 *
 * @get session variables
 *
 * @param mixed $index
 *
 * @return mixed
 *
 */
 public function sessionGet($index)
 {
	if(isset ($_SESSION[$index]))
            return $_SESSION[$index];
        if(isset ($_COOKIE[$index]))
            return $_COOKIE[$index];
        return false;
 }


/**
 * @all controllers must contain an index method
 */
abstract function index();
}

