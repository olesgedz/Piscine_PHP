<?PHP
	if ($_SERVER["PHP_AUTH_USER"] == 'zaz' && $_SERVER["PHP_AUTH_PW"] == 'jaimelespetitsponeys')
	{
?>
<html><body>Hello Zaz<br />
	<img src= 'data:image/png;base64,<?PHP echo base64_encode(file_get_contents('../img/42.png')); ?>'>
</body></html>
<?PHP
	}
	else
	{
		header("HTTP/1.0 401 Unauthorized");
		header("WWW-Authenticate: Basic realm=''Member area''");
?>
<html><body>That area is accessible for members only</body></html>
<?PHP
	}
?>