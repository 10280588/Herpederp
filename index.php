<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<link rel="stylesheet" type="text/css" href="main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<title>Wine Company</title>
</head>
    <body>
	<div id="container">
		<div id="header" >
        </div>
		
		<div id="top_menu"> 
			<ul class="topmenu">
				<li class="topmenu"><a href="index.php?pag=index.txt" class="topmenu">Home</a></li>
				<li class="topmenu"><a href="index.php?pag=productpage.html" class="topmenu">Rode Wijn</a></li>
				<li class="topmenu"><a href="index.php?pag=productpage.html" class="topmenu">Witte Wijn</a></li>
				<li class="topmenu"><a href="index.php?pag=productpage.html" class="topmenu">Mousserend</a></li>
				<li class="topmenu"><a href="index.php?pag=productpage.html" class="topmenu">Accesoires</a></li>
				<li class="topmenu"><a href="index.php?pag=over_wijn.html" class="topmenu">Over Wijn</a></li>
				<li class="topmenu"><a href="index.php?pag=over_ons.html" class="topmenu">Over Ons</a></li>
				<li class="topmenu"><a href="index.php?pag=mandje.html" id="mandje"><img src="images/winkelmandje.png" alt="mandje"/></a> </li>
			</ul>	
		</div>
		
		<div id="left_menu">
			<?php 
			$pag = (isset($_GET['pag'])) ? ($_GET['pag']) : ('') ; //read URL-pag parameter in 
		 	 if (
				$pag=='index.txt' ||
				$pag==''
				){include('leftmenu_frontpage.html');}
			 if (
				$pag=='productpage.html' 
				){include('leftmenu_other.html');}
			 if (
				$pag=='over_ons.html' 
				){include('leftmenu_overons.html');}
			if(
				$pag=='AV.html'
				){include('leftmenu_overons.html');}
			if(
				$pag=='mandje.html' ||
				$pag=='persgeg.html' ||
				$pag=='bestelhistorie.html'
				){
				include('leftmenu_klant.html');}
			if(
				$pag=='beheerder.html' ||
				$pag=='wijntoevoegen.html'
				){
				include('leftmenu_beheerder.html');}
			?>		
		</div>
		
		<div id="content">
			<?php
			 $pag = (isset($_GET['pag'])) ? ($_GET['pag']) : ('') ; //read URL-pag parameter in 
			 if (
				$pag=='index.txt' ||
				$pag=='productpage.html' ||
				$pag=='over_wijn.html' ||
				$pag=='over_ons.html'||
				$pag=='AV.html' ||
				$pag=='mandje.html' ||
				$pag=='persgeg.html' ||
				$pag=='bestelhistorie.html' ||
				$pag=='wijntoevoegen.html'
			 ){
				//a legal file is requested, serve it up
				include($pag) ; //fetch the file and replace '<?php ... by its contents
			 }
			 else {
				//an illegal file is requested; serve an innocent default instead
				include('index.txt');}
			?>
		</div>
		
		<div id="footer">
			Wine Company(c) <a href="index.php?pag=beheerder.html">beheer site </a>
		</div>
		
	</div>

</body>
</html>
