<?php
  if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
     die ('<h2>Direct File Access Prohibited</h2>');
  include 'header.php';
?>

<?php
	 if ($module)
		include "$module.php";
?>

<?php 
  include 'footer.php';
?>