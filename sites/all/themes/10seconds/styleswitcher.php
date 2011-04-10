<?php 
		if (isset($_GET['change']) ) {

			$change = $_GET['change'];
			$styleVar = $_GET['styleVar'];
			if (isset($_GET['page']) ) {
				$thisPage= $_GET['page'];
				10seconds_change_theme($change, $styleVar, $thisPage);
			}
			else {
				10seconds_change_theme($change, $styleVar);
			}
		}
		
		
		if (isset($_GET['newstyle'])) {
		  $10seconds_style = $_GET['newstyle'];
		}
?>
