<?php
  if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
     die ('<h2>Direct File Access Prohibited</h2>');
?>

	<div id = "header">
		<h1><?php echo $site_title; ?></h1>
		<h2>Welcome <?php echo isset($user) ? $user : 'guest'; ?>.</h2>
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
<td><?php if(!empty($pvar)){echo $subtitle;} ?><br />
<?php
if(!empty($pvar)){
    echo '<input name="'.$pvar.'" id="'.$pvar.'"';
    echo 'type="'.($pvar == 'password' ? 'password' : "text").'" size="14" />';
}
?>
</td>
</tr>
<tr>
<?php
if(!empty($pvar)){
    echo '<td><input type="submit" name="submit" value="Send" /></td>';
} else {
	echo '<td><button type="button" onclick="window.location = \''.$_SERVER['PHP_SELF'].'?rt=login/logout\'">Logout</button></td>';
}
?>
</tr>
</table>
</form>

