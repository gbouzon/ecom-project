<html>
	<head>
		<title><?= _("Search") ?></title>
	</head>
	<body>
		<form method="post" action = "" style = "position:absolute;top:10px;right:100px;">
			<input type="text" name="search">
			<select name = "search_type">
				<option value = "store"><?= _("Search By Store") ?></option>
				<option value = "product"><?= _("Search By Product") ?></option>
			</select>
			<button type="submit" name="action"><?= _("Search") ?></button>
		</form>
	</body>
</html>