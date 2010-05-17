	<div id = "header">
		<h1>{$site_title}</h1>
		<h2>Welcome {$user|default:'guest'}.</h2>
	</div>
<button type="button" onclick="window.location = '{$www_root}?rt=login'">Login</button>
