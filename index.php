<?php

function printr ( $array, $exit = false ) {
	echo '<pre style="text-align: left;">';
		print_r( $array );
	echo '</pre>';
	
	if ( $exit ) {
		exit;
	}
}

include 'lib/beer/init.php';