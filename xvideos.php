<?php

$var = file_get_contents( 'http://www.xvideos.com/tags' );
$var = explode( '<ul id="tags">' , $var );
$var = explode( '<div class="main-categories">' , $var[1] );
$var = $var[0];
preg_match_all( '/<a href=\"([^\"]*)\">(.*)<\/a>/iU' , $var , $match );
$links_match = $match[1];

foreach($links_match as $tmp){
	$links[] = 'http://www.xvideos.com' . $tmp;
}

# $links (TAGS DO XVIDEOS)

$a = 0;
$main = true;

for( $i = 0; $i<count($links); $i++ ){
	
	while($main === true){
		$a = $a + 1;
		$links_var = file_get_contents($links[$i] . '/' . [$a]);
		$links_var = explode( '<div class="mozaique">' , $links_var );
		$links_var = explode( '<div class="pagination ">' , $links_var[1] );
		$links_var = $links_var[0];
	
		preg_match_all( '/<a href=\"([^\"]*)\">(.*)<\/a>/iU' , $links_var , $match );
	
		$links_main_var = $match[1];
		if( empty( $links_main_var ) ){ $main = false; } else { $main = true; }
	
		foreach( $links_main_var as $tmp ){
			$links_main[] = 'http://www.xvideos.com' . $tmp; 
			#echo $tmp . '<br />';
			#flush();
		}
	}
	# $links_main (LINKS DO SITE)
}

?>
