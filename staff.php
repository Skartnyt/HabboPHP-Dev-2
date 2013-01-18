<?php

#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|         HABBOPHP - http://habbophp.com                                 #|
#|         Copyright © 2012 Valentin & Robin. All rights reserved.        #|
#|																		  #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require 'init.php';

$tpl->assign('groups','community');
$tpl->assign('selected','selected');
$tpl->display('header.tpl');


//Liste des rangs
// Pour ajouter un rang ajoutez cette ligne : array('Nom' => 'Modérateur' , 	'Rank' => '12' , 'Couleur' => 'darkblue'), à l'intérieur du array $rank

$rank = array(
	array('Nom' => 'Fondateur' , 	'Rank' => '8' , 'Couleur' => 'blue'),
	array('Nom' => 'Modérateur' , 	'Rank' => '7' , 'Couleur' => '#000'),
	array('Nom' => 'Codeur' , 		'Rank' => '6' , 'Couleur' => 'red')
); 

foreach($rank as $ranks){ $minRanks[] = $ranks['Rank'] ; } //On fait un array des ranks
array_multisort($minRanks,SORT_NUMERIC); // On les tri par ordre croissant
$query=$db->query("SELECT rank,username,motto,id,look FROM users WHERE rank>=".intval($minRanks[0]),true);
$tpl->assign('user_info',$query);
$tpl->assign('rank',$rank);

/////////////////////////////////////////////////
// Display
/////////////////////////////////////////////////

$tpl->display('staff.tpl');
$tpl->display('footer.tpl');

?>
