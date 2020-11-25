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


//Kommentar-Seite
function content_showcomments($id) {
	global $set,$db,$apx,$user;
	
	$res=$db->first("SELECT allowcoms FROM ".PRE."_content WHERE ( id='".$id."' AND active='1' ".section_filter()." ) LIMIT 1");
	if ( !$apx->is_module('comments') || !$set['content']['coms'] || !$res['allowcoms'] ) return;
	
	require_once(BASEDIR.getmodulepath('comments').'class.comments.php');
	$coms=new comments('content',$id);
	$coms->assign_comments();
	
	$apx->tmpl->parse('comments','comments');
	require('lib/_end.php');
}


?>