<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shark2Go</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
<meta name="viewport" content="width=device-width" />
</head>
<body onload="self.focus();document.form1.{$pvar}.focus();">
	<div id = "header">
		<h1>Shark2Go</h1>
		<h2>Welcome {$user}.</h2>
	</div>
{if $msg !== ''}
	<p class="error">{$msg}</p>
{/if}

<form name="form1" id="form1" method="post" action="{www_root}?rt=login/verifiy">
<table id="tab">
	<thead  class="Top">
	<tr>
		<th>{$title}</th>
	</tr>
	</thead>
<tr>
<td>{$subtitle}<br />
{if $pvar !== ''}
    <input name="{$pvar}" id="{$pvar}"
    type="{if $pvar == 'pass' }password{else}text{/if}" size="14" />';
{/if}
</td>
</tr>
<tr>
{if $pvar !== ''}
<td><input type="submit" name="submit" value="Send" /></td>';
{/if}
</tr>
</table>
</form>

</body>
</html>
