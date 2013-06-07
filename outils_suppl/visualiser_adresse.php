<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listing des membres Atout EI</title>

<style type="text/css">
<!--

body {
	font-family: Arial, Helvetica, sans-serif;
	font-size:10px;
	margin: 20px;
}
.odd:hover, .even:hover {
	background-color:#999;
}

.odd {
	background-color:#DEDEDE;
}
.even {
	background-color:#FAFAFA;
}

-->
</style>

</head>

<body>

<?php
echo '<p>Listing des membres Atout EI (' . date("d/m/Y h\hi") . ')</p>';
$nr_ligne = 0;

require("db_connect.php");

	$reponse = mysql_query("SELECT * FROM spip_auteurs_elargis 
	LEFT JOIN spip_auteurs
	ON spip_auteurs_elargis.id_auteur = spip_auteurs.id_auteur 
	WHERE statut = '6forum' 
	ORDER BY nom ");
	
	
	
	echo '<table width="700" border="1" cellpadding="3">' ;
	echo '<tr bgcolor="#DDDDDD">
		
		<td>id auteur</th>
		<th>nom</th>
		<th>adresse</th>
		<th>code postal</th>
		<th>ville</th>
		<th>tel</th>
		<th>fax</th>
		<th>mobile</th>

		<th>type clientele</th>
		<th>siege exploitation</th>
		<th>chef entreprise</th>
		<th>autres coordonnees</th>
		<th>nr entreprise</th>
		<th>secteur détaillé</th>
		<th>personne de contact</th>

		<th>email</a></th>
		<th>url_site</a></th>
		
		</tr>' ;
		
		
	while ($donnees = mysql_fetch_array($reponse))
	{
		$nr_ligne++;
		if ($nr_ligne%2)
		{
			echo '<tr class="even">';
		}
		else
		{
			echo '<tr class="odd">';
		}
		
		echo '
		<td bgcolor="#DDDDDD">' . $donnees['id_auteur'] . '</td>
		<td><strong>' . $donnees['nom'] . '</strong></td>
		<td>' . $donnees['adresse_pro'] . '</td>
		<td>' . $donnees['code_postal_pro'] . '</td>
		<td>' . $donnees['ville_pro'] . '</td>
		<td>' . $donnees['telephone_pro'] . '</td>
		<td>' . $donnees['fax_pro'] . '</td>
		<td>' . $donnees['mobile_pro'] . '</td>

		<td>' . $donnees['type_clientele'] . '</td>
		<td>' . $donnees['adresse_siege_exploitation'] . '</td>
		<td>' . $donnees['chef_entreprise'] . '</td>
		<td>' . $donnees['autres_coordonnees'] . '</td>
		<td>' . $donnees['nr_entreprise'] . '</td>
		<td>' . substr($donnees['secteur_detaille'],0,30) . '</td>
		<td>' . $donnees['personne_contact'] . '</td>

		<td><a href="maito:' . $donnees['email'] . '">' . $donnees['email'] . '</a></td>
		<td><a href=":' . $donnees['url_site'] . '">' . $donnees['url_site'] . '</a></td>
		
		</tr>' ;
	}
	echo '</table>' ;



mysql_close(); 



?>

</body>
</html>

