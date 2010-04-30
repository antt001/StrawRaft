<?php
  if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
     die ('<h2>Direct File Access Prohibited</h2>');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>StrawRaft</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
<meta name="viewport" content="width=device-width" />
</head>
    <body>
<h1><?php echo $blog_heading; ?></h1>

<p><?php echo $blog_content; ?></p>
</body>
</html>