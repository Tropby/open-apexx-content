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



require_once(BASEDIR.getmodulepath('content').'functions.php');



function misc_content_comments() {
	global $set,$db,$apx,$user;
	$_REQUEST['id']=(int)$_REQUEST['id'];
	if ( !$_REQUEST['id'] ) die('missing ID!');
	$apx->tmpl->loaddesign('blank');
	content_showcomments($_REQUEST['id']);
}


?>