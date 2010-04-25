<?php
  if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
     die ('<h2>Direct File Access Prohibited</h2>');
?>
<h1><?php echo $blog_heading; ?></h1>

<p><?php echo $blog_content; ?></p>
