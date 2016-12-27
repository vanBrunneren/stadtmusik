<?php

function convertBreadcrumbName($name) {

	switch ($name) {
		case 'admin':
			$convertedName = "Dashboard";
			break;

		case 'navigation':
			$convertedName = "Navigation";
			break;

		case 'home':
			$convertedName = "Home";
			break;

		case 'celebration':
			$convertedName = "Jubiläum";
			break;

		case 'agenda':
			$convertedName = 'Agenda';
			break;

		case 'create':
			$convertedName = 'erstellen';
			break;

		case 'edit':
			$convertedName = 'bearbeiten';
			break;

		case 'categories':
			$convertedName = 'Kategorien';
			break;

		case 'portrait':
			$convertedName = 'Portrait';
			break;
		
		default:
			$convertedName = $name;
			break;
	}

	return $convertedName;
}

function convertRouteToBreadcrumbs($routeName) {

	$splittedRoute = explode("/", $routeName);

	$returnString = "";
	$link = "";
	for($i = 0; $i < count($splittedRoute); $i++) {
		if($splittedRoute[$i] != "index" && substr($splittedRoute[$i], 0, 1) != "{" && $splittedRoute[$i] != 'login') {
			if($i != 0) {
				$returnString .= " / ";
			}
			$link .= "/".$splittedRoute[$i];
			$returnString .= "<a href=\"".$link."\">".convertBreadcrumbName($splittedRoute[$i])."</a>";
		}
	}

	return $returnString;

}
