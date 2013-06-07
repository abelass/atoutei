<?php

$GLOBALS['table_des_traitements']['TITRE'][]= 'typo(supprimer_numero(%s), "TYPO", $connect)';
$GLOBALS['table_des_traitements']['NOM'][]= 'typo(supprimer_numero(%s), "TYPO", $connect)';

define('_IMG_GD_QUALITE', 95);

#$GLOBALS['spip_pipeline']['formulaire_traiter'] .= "|atoutei_formulaire_traiter";

 
/*function atoutei_formulaire_traiter($flux) {
	
    $form=$flux['args']['form'];
    echo  $form;
    if($form=='inscription2'){
		$notifications('patate_instituer', $id_patate, array('avant' => $statut_avant, 'apres' => $statut_apres));
		}
}*/


?>
