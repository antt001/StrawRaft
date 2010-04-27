<?php

 /*** error reporting on ***/
 error_reporting(E_ALL);
 
 /*** create session ***/
 session_start();

 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
 define ('__SITE_PATH', $site_path);
 define('DS', DIRECTORY_SEPARATOR);

 /*** include the init.php file ***/
 include  'lib'.DS.'init.php';

 $config = config::getInstance();

 // set the timezone
date_default_timezone_set($config->config_values['application']['timezone']);

 /*** load the router ***/
 $registry->router = new router($registry);

 /*** set the controller path ***/
 $registry->router->setPath (__SITE_PATH . DS.'controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

 /*** load the controller ***/
 $registry->router->loader();

?>
