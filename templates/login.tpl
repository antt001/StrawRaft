	<div id = "header">
		<h1>{$site_title}</h1>
		<h2>Welcome {$user|default:'guest'}.</h2>
	</div>
{if $msg}
	<p class="error">{$msg}</p>
{/if}

<form name="form1" id="form1" method="post" action="{$www_root}?rt=login/verifiy">
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
    type="{if $pvar == 'password' }password{else}text{/if}" size="14" />
{/if}
</td>
</tr>
<tr>
{if $pvar !== ''}
<td><input type="submit" name="submit" value="Send" /></td>
{else}
<td><button type="button" onclick="window.location = '{$www_root}?rt=login/logout'">Logout</button></td>
{/if}
</tr>
</table>
</form>