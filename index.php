<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		
		<title>upload here</title>
		
		<style type="text/css">		
			body {
				font-family: sans-serif;
				margin:0;
				padding: 10px 20px;
			}
			
			h1, h2, ul {
				margin:0;
			}
			
			h2 {
				margin-top: 0.5em;
			}
			
			a {
				display: inline-block;
				width:   250px;
				color:	green;
			}
			
			span {
				text-align: right;
				width:		80px;
				display:   inline-block;
			}
			
			ul {
				background-color: #DFD;
				padding: 10px 20px;
				display: inline-block;
				list-style: none;
			}
			
			form {
				background-color: #FDD;
				padding: 10px 20px;
				display: inline-block;
			}
		</style>
	</head>
	
	<body>
		<h1>upload here</h1>

<?php
	$dir = 'files';
	
	function human_filesize($bytes, $decimals = 1) {
		$sz = ' KMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		if ($factor == 0) { return $bytes . ' '; }
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . @$sz[$factor];
	}
	
	if ($_POST['up']) {
		echo '<h2>upload status</h2>';
		echo '<pre>';
		if ($_FILES['file']['error'] > 0) {
			echo 'Error: ' . $_FILES['file']['error'];
		}
		else {
			$fn = basename($_FILES['file']['name']);
			$target_path = getcwd() . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $fn;
			move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
			echo 'Upload:   ' . $_FILES['file']['name'] . '<br/>';
			echo 'Type:     ' . $_FILES['file']['type'] . '<br/>';
			echo 'Size:     ' . human_filesize($_FILES['file']['size']) . 'B<br/>';
			//echo 'Saved to: ' . $target_path;
		}
		echo '</pre>';
		echo '<a href="index.php">go back</a>';
		exit(0);
	}
	
	$files = scandir($dir);
	array_shift($files);
	array_shift($files);
	
	echo '<h2>download:</h2>';
	echo '<ul>';
	foreach ($files as $f) {
		$f2 = $dir . DIRECTORY_SEPARATOR . $f;
		$fs = human_filesize( filesize($f2) );
		echo '<li><a href="' . $f2 . '">' . $f . '</a> <span>' . $fs . 'B</span></li>';
	}
	echo '</ul>';
?>

<h2>upload:</h2>
		<form action="index.php" method="POST" enctype="multipart/form-data">
			<label for="file">file name:</label>
			<input type="hidden" name="up" value="1" />
			<input type="file" name="file" id="file" /> 
			<br />
			<input type="submit" name="submit" value="send file" />
		</form>
	</body>
</html>
