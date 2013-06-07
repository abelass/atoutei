<?php

function correspondance_provinces($id_province=''){
	$provinces=array(
		1=>'Hainaut',
		2=>'Brabant Wallon',
		3=>'Namur',
		4=>'Liège',
		5=>'Luxembourg'
	);
	
	if($id_province)$return=$provinces[$id_province];
	else $return=$provinces;
	
	return $return;	
	}

?>
