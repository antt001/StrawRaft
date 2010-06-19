	<div id = "header">
		<h1><?php echo $site_title; ?></h1>
		<h2>Welcome <?php echo isset($user) ? $user : 'guest'; ?>.</h2>
	</div>
<button type="button" onclick="window.location = '<?php echo $_SERVER['PHP_SELF']; ?>?rt=login'">Login</button>
