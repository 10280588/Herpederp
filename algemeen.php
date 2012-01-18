<?php
		 $pag = (isset($_GET['pag'])) ? ($_GET['pag']) : ('') ; //read URL-pag parameter in 
		 if (
			$pag=='index.txt' ||
			$pag=='productpage.html' ||
			$pag=='over_ons.html'
		 ){
			//a legal file is requested, serve it up
		 	include($index.txt) ; //fetch the file and replace '<?php ... by its contents
		 }
		 else {
			//an illegal file is requested; serve an innocent default instead
			include('index.txt');
		 }
		 ?>
