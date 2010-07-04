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
 $registry->dispatcher = new dispatcher($registry);

 /*** set the controller path ***/
 $registry->dispatcher->setPath (__SITE_PATH . DS.'controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

 $registry->router = new router($registry);
  $registry->router->route();
 /*** load the controller ***/
 $registry->dispatcher->loader();

?>
