<!doctype html>
<html>
	<head>
		<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

		<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
	</head>
	<body>
		<h1>House of Lines</h1>
		<pre><?php print_r((new Solution(false))->path, true); ?></pre>
	</body>
</html>