<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<style>
			body {
				margin: 0;
				padding: 0;
				text-align: center;
			}
			
			table thead tr {
				text-align: left;
				background: #ccc;
			}
			
			table tbody tr {
				background: #eee;
			}
			
			table td, table th {
				padding: 5px;
			}
			
			table {
				border: none;
				border-collapse: collapse;
			}
			
			ul li {
				list-style: none;
			}
			
			#navbar ul li {
				display: inline-block;
				margin-right: 10px;
			}
			
			#navbar ul {
				margin: 0;
				padding: 0;
			}
			
			#navbar {
				margin: 10px 0;
				padding: 10px 0;
			}
			
			#wrap {
				text-align: left;
				width: 960px;
				margin: auto;
			}
			
			
		</style>
	</head>
	
	<body>
		<div id="wrap">
			<div id="header"><?php include 'header.php'; ?></div>
			<div id="navbar"><?php include 'navbar.php'; ?></div>
			<div id="middle">
				<!--<div id="sidebar"><?php include 'sidebar.php'; ?></div>-->
				<div id="content"><?php include DIR_APP_MODULE.'views'.DS.$this->content.'.php'; ?></div>
			</div>
			<div id="footer"><?php //include 'footer.php'; ?></div>
		</div>
	</body>
</html>