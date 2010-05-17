<?php

/**
 *
 * @Temporary template class
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

include('smarty/Smarty.class.php');

Class Template {

/*
 * @the registry
 * @access private
 */
private $registry;

/*
 * @Variables array
 * @access private
 */
private $vars = array();

/*
 * @Smarty object
 * @access private
 */
private $_smarty;


/**
 *
 * @constructor
 *
 * @access public
 *
 * @return void
 *
 */
function __construct($registry) {
	$this->registry = $registry;
        $config = config::getInstance();
        $this->_smarty = new Smarty;
        $this->site_title = $config->config_values['application']['site_title'];
        $this->_smarty->compile_dir = $config->config_values['application']['templates_compile_dir'];
}


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


function show($name) {
	$path = __SITE_PATH . DS .'templates' . DS . $name . '.tpl';

	if (file_exists($path) == false)
	{
		throw new Exception('Template not found in '. $path);
		return false;
	}

	// Load variables
	foreach ($this->vars as $key => $value)
	{
            $this->_smarty->assign($key, $value);
            //$$key = $value;
	}

	//include ($path);
        $this->_smarty->display($path);
  }


}

?>
