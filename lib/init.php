<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

 /*** include the controller class ***/
 include_once __SITE_PATH . DS . 'lib' . DS . 'controller_base.class.php';

 /*** include the registry class ***/
 include __SITE_PATH . DS . 'lib' . DS . 'registry.class.php';

 /*** include the router class ***/
 include __SITE_PATH . DS . 'lib' . DS . 'router.class.php';

 /*** include the template class ***/
 include __SITE_PATH . DS . 'lib' . DS . 'template.class.php';

 /*** auto load model classes ***/
 function __autoload($class_name) {
    $filename = strtolower($class_name) . '.class.php';
    $file = __SITE_PATH . DS . 'model' . DS . $filename;
    #debug
    #echo $file;

    if (file_exists($file) == false)
    {
		$file = __SITE_PATH . DS . 'lib' . DS . $filename;
		if (file_exists($file) == false)
		{
			return false;
		}
    }
    include_once ($file);
}

 /*** a new registry object ***/
 $registry = new registry;

 /*** create the database registry object ***/
 //$registry->db = db::getInstance();
?>
