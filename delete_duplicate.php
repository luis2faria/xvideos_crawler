<?php

$fp = fopen( 'xlist.txt', 'a+' );

$var = file_get_contents( 'list.txt' );
$var = explode( "\n" , $var );
$var = array_values ( array_unique ( $var ) );

foreach( $var as $tmp ){
	fwrite( $fp, $tmp . "\n" );
}

fclose( $fp );

?>
