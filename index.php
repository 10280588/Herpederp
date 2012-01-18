<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<link rel="stylesheet" type="text/css" href="main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<title>Wine Compagny</title>
</head>
    <body>
	<div id="container">
		<div id="header" >
            	</div>
		<div id="top_menu"> 
		<ul>
		<li><a href="index.php?pag=index.txt">Home</a></li>
		<li><a href="index.php?pag=productpage.html">
		Rode Wijn</a></li>
		<li><a href="index.php?pag=productpage.html">Witte Wijn</a>
		</li>
		<li><a href="index.php?pag=productpage.html">Mousserend</a>
		</li>
		<li><a href="index.php?pag=productpage.html">Accesoires</a>
		</li>
		<li><a href="#">Over Wijn</a></li>
		<li><a href="index.php?pag=over_ons.html">Over Ons</a></li>
		</ul>		
		</div>
		<div id="left_menu">
			<?php 
		 $pag = (isset($_GET['pag'])) ? ($_GET['pag']) : ('') ; //read URL-pag parameter in 
		 	 if (
				$pag=='index.txt' 
				){include('leftmenu_frontpage.html');}
			 if (
				$pag=='productpage.html' 
				){include('leftmenu_other.html');}
			 if (
				$pag=='over_ons.html' 
				){include('leftmenu_overons.html');}
			if(
				$pag==''
				){include('leftmenu_frontpage.html');}

			if(
				$pag=='AV.html'
				){include('leftmenu_overons.html');}
		
		
		 ?>
				
		</div>
		<div id="content">
		<?php
		 $pag = (isset($_GET['pag'])) ? ($_GET['pag']) : ('') ; //read URL-pag parameter in 
		 if (
			$pag=='index.txt' ||
			$pag=='productpage.html' ||
			$pag=='over_ons.html'||
			$pag=='AV.html'
		 ){
			//a legal file is requested, serve it up
		 	include($pag) ; //fetch the file and replace '<?php ... by its contents
		 }
		 else {
			//an illegal file is requested; serve an innocent default instead
			include('index.txt');
		 }
		 ?>
			
            	</div>
		
	</div>


    </body>
</html>
