<?php 

/*
	Open Apexx Module Manager
	(c) Copyright 2005-2009, Christian Scheb

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU Lesser General Public License as published by
	the Free Software Foundation, either version 2.1 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Lesser General Public License for more details.

	You should have received a copy of the GNU Lesser General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



//Security-Check
if ( !defined('APXRUN') ) die('You are not allowed to execute this file directly!');



function search_content($items,$conn) {
	global $set,$db,$apx,$user;
	
	//Suchstring generieren
	foreach ( $items AS $item ) {
		$search[]=" ( title LIKE '%".addslashes_like($item)."%' OR text LIKE '%".addslashes_like($item)."%' ) ";
	}
	$searchstring=implode($conn,$search);
	
	//Ergebnisse
	$data=$db->fetch("SELECT id,title FROM ".PRE."_content WHERE ( searchable='1' AND active='1' ".section_filter()." AND ( ".$searchstring." ) ) ORDER BY title ASC");
	if ( count($data) ) {
		foreach ( $data AS $res ) {
			++$i;
			
			$temp=explode('->',$res['title']);
			$title=array_pop($temp);
			
			$link=mklink(
				'content.php?id='.$res['id'],
				'content,'.$res['id'].urlformat($title).'.html'
			);
			
			$result[$i]['TITLE']=strip_tags($title);
			$result[$i]['LINK']=$link;
		}
	}
	
	return $result;
}

?>