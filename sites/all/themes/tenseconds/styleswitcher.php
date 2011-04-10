<?php 
		if (isset($_GET['change']) ) {

			$change = $_GET['change'];
			$styleVar = $_GET['styleVar'];
			if (isset($_GET['page']) ) {
				$thisPage= $_GET['page'];
				tenseconds_change_theme($change, $styleVar, $thisPage);
			}
			else {
				tenseconds_change_theme($change, $styleVar);
			}
		}
		
		
		if (isset($_GET['newstyle'])) {
		  $tenseconds_style = $_GET['newstyle'];
		}
?>
