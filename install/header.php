<?php

session_start();

include("functions.php");

// +-----------------------------------------------------------------------+
// | Simple Invoices                                                       |
// | Licence: GNU General Public License 2.0                               |
// +-----------------------------------------------------------------------+

// définition automatique de la langue du navigateur
$langNav = substr(getenv("HTTP_ACCEPT_LANGUAGE"),0,2);
$langNav = "en";

// Selection du fichier de langue
if(!empty($langNav)) {
	include('lang/lang_'.$langNav.'.php');
	$_SESSION['language']= $langNav;
}
else {
	$langNav = "en";
}

?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Simple Invoices | Installer</title>
<!-- Robots -->
<meta name="robots" content="noindex,nofollow" />
<!-- Content -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="./css/screen.css" media="all" />
<link rel="shortcut icon" type="image/x-icon" href="./images/common/favicon.ico" />
</head>
<body>
