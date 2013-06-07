<?php
/*
 * Plugin Notifications
 * (c) 2009 SPIP
 * Distribue sous licence GPL
 *
 */


/**
 * inscription d'un nouvel auteur => mail aux admins
 *
 * @param string $quoi
 * @param int $id_auteur
 * @options array $options
 */
function notifications_inscription_dist($quoi, $id_auteur, $options) {
	if (!isset($GLOBALS['notifications']['inscription'])
	  OR !$GLOBALS['notifications']['inscription'])
		return;
	
	$modele = "notifications/inscription";

	include_spip('inc/config');
	$email=lire_config('email_webmaster');
	//$destinataires = array($email);
	$destinataires = array(0=>'federation@atoutei.be',1=>'mc.jamoye@atoutei.be');
	
	/*$query = sql_select("email","spip_auteurs","statut = '0minirezo'");

	// notifier uniquement les webmestres ?
	if ($GLOBALS['notifications']['inscription'] == 'webmestres') {
		$query = sql_select("email","spip_auteurs","statut = '0minirezo' AND webmestre = 'oui'");
	}

	while ($row = sql_fetch($query)) {
		$destinataires[] = $row["email"];
	}*/

	$destinataires = pipeline('notifications_destinataires',
		array(
			'args'=>array('quoi'=>$quoi,'id'=>$id_auteur,'options'=>$options)
		,
			'data'=>$destinataires)
	);

	$envoyer_mail = charger_fonction('envoyer_mail','inc'); // pour nettoyer_titre_email
	$texte = recuperer_fond($modele,array('id_auteur'=>$id_auteur,'option'=>$options));
	
	notifications_envoyer_mails($destinataires, $texte);

}

?>
