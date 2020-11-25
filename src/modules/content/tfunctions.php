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


# Content Class
# =============

//Security-Check
if ( !defined('APXRUN') ) die('You are not allowed to execute this file directly!');



//Statistik anzeigen
function content_stats($template='stats') {
	global $set,$db,$apx,$user;
	$tmpl=new tengine;
	$parse = $tmpl->used_vars('functions/'.$template,'content');
	
	$apx->lang->drop('func_stats', 'content');
	
	if ( in_template(array('COUNT', 'AVG_HITS'), $parse) ) {
		list($count, $hits) = $db->first("
			SELECT count(id), avg(hits) FROM ".PRE."_content
			WHERE active=1
		");
		$tmpl->assign('COUNT', $count);
		$tmpl->assign('AVG_HITS', round($hits));
	}
	
	$tmpl->parse('functions/'.$template,'content');
}


function content_show($id='0', $template='inline')
{
	global $set, $db, $apx, $user;
	
	$tmpl=new tengine;
	
	$data = $db->first("SELECT * FROM ".PRE."_content WHERE id=".$id.";");
	if( $data["active"] )
	{
		$tmpl->assign('PAGE', $data["text"]);

		$tmpl->assign('TITLE', $data["title"]);		
		$tmpl->assign('ID', $id);
		$tmpl->assign('ANKER', "CONTENT_".$id);
	}
	else
	{		
		$tmpl->assign('ID', $id);
		$tmpl->assign('PAGE', "Dieser Teil der Webseite (".$data["title"].") wird zurzeit überarbeitet! Bitte haben Sie etwas Geduld. Danke!");
		$tmpl->assign('TITLE', "Wartungsarbeiten" );
		$tmpl->assign('ANKER', "CONTENT_".$id);
	}
	
	$tmpl->parse('functions/'.$template,'content');
}

?>