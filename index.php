<?php

/*
* Script: index.php
* 	Main controller file for Simple Invoices
*
* License:
*	 GPL v3 or above
*/

//stop browsing to files directly - all viewing to be handled by index.php
//if browse not defined then the page will exit
define("BROWSE","browse");

$module = isset($_GET['module'])?$_GET['module']:null;
$view = isset($_GET['view'])?$_GET['view']:null;
$action = isset($_GET['case'])?$_GET['case']:null;

/*
* The include configs and requirements stuff section - start
*/
require_once("./include/init.php");

foreach($extension as $key=>$value)
{
	/*
	* If extension is enabled then continue and include the requested file for that extension if it exists
	*/	
	if($value['enabled'] == "1")
	{
		//echo "Enabled:".$value['name']."<br><br>";
		if(file_exists("./extensions/$value[name]/include/init.php"))
		{
			require_once("./extensions/$value[name]/include/init.php");
		}
	}
}
/*
* The include configs and requirements stuff section - end
*/

$smarty -> assign("authenticationOn",$authenticationOn); // to toggle the login / logout button visibility in the menu
$smarty -> assign("module",$module);


$smarty -> assign("LANG",$LANG);
//For Making easy enabled pop-menus (see biller)
$smarty -> assign("enabled",array($LANG['disabled'],$LANG['enabled']));

$menu = true;
//$menu = false;
$file = "home";

// Check for any unapplied SQL patches when going home
if (($module == "options") && ($view == "database_sqlpatches")) {
	include_once('./modules/options/database_sqlpatches.php');
	donePatches();
} elseif ($file == 'home') {
	include_once('./modules/options/database_sqlpatches.php');
	if (getNumberOfPatches() > 0 ) {
		$view = "database_sqlpatches";
		$module = "options";

		if($action == "run") {
			runPatches();
		} else {
			listPatches();
		}
		$menu = false;
	}
}


/*
* dont include the header if requested file is an invoice template - for print preview etc.. header is not needed 
*/
if ( ($module == "invoices" ) && (strstr($view,"templates")) ) {
	//TODO: why is $view templates/template?...


		/*
		* If extension is enabled load the extension php file for the module	
		* Note: this system is probably slow - if you got a better method for handling extensions let me know
		*/
		$extensionInvoiceTemplateFile = 0;
		foreach($extension as $key=>$value)
		{
			/*
			* If extension is enabled then continue and include the requested file for that extension if it exists
			*/	
			if($value['enabled'] == "1")
			{
				//echo "Enabled:".$value['name']."<br><br>";
				if(file_exists("./extensions/$value[name]/modules/invoices/template.php")) {
			
					include_once("./extensions/$value[name]/modules/invoices/template.php");
					$extensionInvoiceTemplateFile++;
				}
			}
		}
		/*
		* If no extension php file for requested file load the normal php file if it exists
		*/
		if( ($extensionInvoiceTemplateFile == 0) AND (file_exists("./modules/invoices/template.php")) ) 
		{
			include_once("./modules/invoices/template.php");
		}


	exit(0);
}


$path = "$module/$view";

/*
* If extension is enabled load its javascript files	- start
* Note: this system is probably slow - if you got a better method for handling extensions let me know
*/
foreach($extension as $key=>$value)
{
	/*
	* If extension is enabled then continue and include the requested file for that extension if it exists
	*/	
	if($value['enabled'] == "1")
	{
		//echo "Enabled:".$value['name']."<br><br>";
		if(file_exists("./extensions/".$value['name']."/include/jquery/".$value['name'].".jquery.ext.js")) {
			$extension_jquery_files .= "<script type=\"text/javascript\" src=\"./extensions/".$value['name']."/include/jquery/".$value['name'].".jquery.ext.js\"></script>";
		}
	}
}

$smarty -> assign("extension_jquery_files",$extension_jquery_files);
/*
* If extension is enabled load its javascript files	- end
*/

/*
* Prep the page - load the header stuff - start
*/

	// To remove the js error due to multiple document.ready.function() 
	// 	in jquery.datePicker.js, jquery.autocomplete.conf.js and jquery.accordian.js 
	//	 without instances in manage pages - Ap.Muthu
	/*
	* TODO: fix the javascript or move datapicker to extjs to fix this hack - not nice
	*/

if( !in_array($module."_".$view, $early_exit) )
{
	if ($view == "manage") 
		$smarty -> display("../templates/default/headerm.tpl");
	else
		$smarty -> display("../templates/default/header.tpl");
}
/*
* Prep the page - load the header stuff - end
*/

/*
* Include the php file for the requested page section - start
*/

		/*Local the requested php file for the module*/
		preg_match("/^[a-z|A-Z|_]+\/[a-z|A-Z|_]+/",$path,$res);

		if(isset($res[0]) && $res[0] == $path) 
		{
			$file = $path;
		}	
		
		/*
		* If extension is enabled load the extension php file for the module	
		* Note: this system is probably slow - if you got a better method for handling extensions let me know
		*/
		$extensionPHPFile = 0;
		foreach($extension as $key=>$value)
		{
			/*
			* If extension is enabled then continue and include the requested file for that extension if it exists
			*/	
			if($value['enabled'] == "1")
			{


				//echo "Enabled:".$value['name']."<br><br>";
				if(file_exists("./extensions/$value[name]/modules/$path.php")) {
			
					preg_match("/^[a-z|A-Z|_]+\/[a-z|A-Z|_]+/",$path,$res);

					if(isset($res[0]) && $res[0] == $path) {
						$file = $path;
					}	

					include_once("./extensions/$value[name]/modules/$file.php");
					$extensionPHPFile++;
				}
			}
		}
		/*
		* If no extension php file for requested file load the normal php file if it exists
		*/
		if( ($extensionPHPFile == 0) AND (file_exists("./modules/$file.php")) ) 
		{
			include_once("./modules/$file.php");
		}

/*
* Include the php file for the requested page section - end
*/

if($module == "export")
{
	exit(0);
}
		
//temp added menu.tpl back in so we can easily design new menu system

/*
* Menu : If extension has custom menu use it else use default - start
*/

if($menu == "true")
{	
	$extensionMenu = 0;
	foreach($extension as $tplKey=>$tplValue)
	{
		/*
		* If extension is enabled then continue and include the requested file for that extension if it exists
		*/	
		if($tplValue['enabled'] == "1")
		{
			if(file_exists("./extensions/$tplValue[name]/templates/default/menu.tpl")) 
			{
				$smarty -> display("../extensions/$tplValue[name]/templates/default/menu.tpl");
				$extensionMenu++;
			}
		}
	}
	/*
	* If no extension php file for requested file load the normal php file if it exists
	*/
	if($extensionMenu == 0) 
	{
		$smarty -> display("../templates/default/menu.tpl");
	}
}
/*
* Menu : If extension has custom menu use it else use default - end
*/

$smarty -> display("../templates/default/main.tpl");
//Shouldn't be necessary anymore. Is for old files without templates...

/*
* Include the smarty template for the requested page section - start
*/

/*
* If no extensions template is applicable then show the default one
* use the $extensionTemplates variable to count the number of applicable extensions template
* --if = 0 after checking all extensions then show default
*/
$extensionTemplates = 0;
foreach($extension as $tplKey=>$tplValue)
{
	/*
	* If extension is enabled then continue and include the requested file for that extension if it exists
	*/	
	if($tplValue['enabled'] == "1")
	{
		if(file_exists("./extensions/$tplValue[name]/templates/default/$file.tpl")) 
		{
			$path = "../extensions/$tplValue[name]/templates/default/$module/";
			$tplDirectory = "extensions/$tplValue[name]/";
			$extensionTemplates++;
		}
	}
}
/*
* If no application templates found then show default template
* TODO Note: if more than one extension has got a template for the requested file than thats trouble :(
* - we really need a better extensions system
*/
if( ($extensionTemplates == 0) AND (file_exists("./templates/default/$file.tpl")) ) 
{ 
			$path = "../templates/default/$module/";
			$tplDirectory = "";
			$extensionTemplates++;
}

$smarty->assign("path",$path);
$smarty -> display("../".$tplDirectory."templates/default/$file.tpl");

// If no smarty template - add message - onyl uncomment for dev - commented out for release
if ($extensionTemplates == 0 )
{
	error_log("NOTEMPLATE!!!");
}

/*
* Include the template for the requested page section - end
*/

$smarty -> display("../templates/default/footer.tpl");

?>
