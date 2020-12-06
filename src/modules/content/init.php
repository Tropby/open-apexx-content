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


//Modul registrieren
$module = array(1,950,
'id' => 'content',
'dependence' => array('comments','ratings'),
'requirement' => array('main' => '1.3.0', 'user' => '1.2.4'),
'version' => '2.1.0',
'author' => 'Christian Scheb, Carsten Grings',
'contact' => 'http://www.stylemotion.de',
'mediainput' => array(
	1 =>	array(
				'icon' => '<img src="design/mm/insert_text.gif" alt="{MM_INSERTCONTENT}" title="{MM_INSERTCONTENT}" style="vertical-align:middle;" />',
				'function' => 'top.opener.insert_image(\'text\',\'{PATH}\')',
				'filetype' => array('GIF','JPG','JPEG','JPE','PNG'),
				'urlrel' => 'httpdir'
				)
	)
);


//Aktionen registrieren     S V O R
$action['show']    =  array(0,1,1,0);
$action['add']     =  array(0,1,2,0);
$action['edit']    =  array(1,0,3,0);
$action['del']     =  array(1,0,4,0);
$action['enable']  =  array(1,0,5,0);
$action['disable'] =  array(1,0,6,0);
$action['group']   =  array(0,1,7,0);

/*
S = Sonderrechte
V = Sichtbar (Visibility)
O = Anordnung (Order)
R = Rechte für Alle
*/


//Template-Funktionen     F           V			D			P
//$func['']=array('',true);
$func['CONTENT_STATS']=array('content_stats',true, "Shows the content stats.");
$func['CONTENT_SHOW'] =array('content_show',true, 'Shows a content text in an other template.', array("ID" => "content id"));
$func['CONTENT_PARSE'] =array('content_parse',true,'Pasing a content text as template.', array("ID" => "content id to parse"));

/*
F = Funktions-Name
V = Variablen akzeptieren
D = Beschreibung der Template-Funktion
P = Array: Parameter der Template-Funktion
*/


?>