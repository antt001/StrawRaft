<?php
  if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
     die ('<h2>Direct File Access Prohibited</h2>');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shark2Go</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body onload="self.focus();document.form1.<?php echo $pvar; ?>.focus();">
	<div id = "header">
		<h1>Shark2Go</h1>
		<h2>Welcome <?php $user ?>.</h2>
	</div>
<?php
if(!empty($msg)){
	echo '<p class="error">';
	echo $msg;
	echo '</p>';
	}
?>

<form name="form1" id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?rt=login/verifiy">
<table id="tab">
	<thead  class="Top">
	<tr>
		<th><?php echo $title; ?></th>
	</tr>
	</thead>
<tr>
<td><?php echo $subtitle; ?><br />
<?php
if(!empty($pvar)){
    echo '<input name="'.$pvar.'" id="'.$pvar.'"';
    echo 'type="'.($pvar == 'pass' ? 'password' : "text").'" size="14" />';
}
?>
</td>
</tr>
<tr>
<?php
if(!empty($pvar)){
    echo '<td><input type="submit" name="submit" value="Send" /></td>';
}
?>
</tr>
</table>
</form>

</body>
</html>
