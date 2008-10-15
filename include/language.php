<?php
/*
 * Read language informations
 * 1. reads default-language file
 * 2. reads requested language file
 * 3. make some editing (Upper-Case etc.)
 * 
 * Not in each translated file need to be each all translations, only in the default-lang-file (english)
 */


//http_negotiate_language($langs, $result);
//print_r($result);
unset($LANG);

/*if upgrading from old version then getDefaultLang wont work during install*/
if(checkTableExists(TB_PREFIX.'system_defaults') == true)
{
	$language = getDefaultLanguage();
}
else
{
	$language = "en-gb";
}  

function getLanguageArray($override="") {
	global $language;
	global $extension;
	
	($override!="") ? $language = $override : $language = $language  ;
	//if statement for the 200709 release
	if($language == "en")
	{
		$language = "en-gb";
	}
	$langPath = "./lang/";
	$langFile = "/lang.php";
	//$getLanguage = getenv("HTTP_ACCEPT_LANGUAGE");
	//$language = getDefaultLanguage();

	//include english as default - so if the selected lang doesnt have the required lang then it still loads
	include($langPath."en-gb".$langFile);

	include($langPath.$language.$langFile);

	foreach($extension as $key=>$value)
	{
		/*
		* If extension is enabled then continue and include the requested file for that extension if it exists
		*/	
		$extension_lang_file = "./extensions/".$value['name']."/lang/".$language.$langFile;
		if($value['enabled'] == "1")
		{
			//echo "Enabled:".$value['name']."<br><br>";
			if(file_exists($extension_lang_file)) {
				include($extension_lang_file);
			}
		}
	}
	/*
	if(file_exists($langPath.substr($getLanguage,0,2).$langFile)) {
		include($langPath.substr($getLanguage,0,2).$langFile);
	}
	
	if(file_exists($langPath.substr($getLanguage,0,5).$langFile)) {
		include($langPath.substr($getLanguage,0,5).$langFile);
	}
	*/
	
	return $LANG;
}

function getLanguageList() {
	$xmlFile = "info.xml";
	$langPath = "lang/";
	$folders = null;
	
	if($handle = opendir($langPath)) {
		
		//TODO: catch ., .. and other bad folders
		for($i=0;$file = readdir($handle);$i++) {
			$folders[$i] = $file;
		}
		closedir($handle);
	}
	
	$languages = null;
	$i = 0;
	
	foreach($folders as $folder) {
		$file = $langPath.$folder."/".$xmlFile;
		if(file_exists($file)) {
			//echo $file."<br />";
			$values = simplexml_load_file($file);
			$languages[$i] = $values;
			$i++;
			//print_r($values);
			//echo $values->name;
		}
	}
	
	return $languages;
}


$LANG = getLanguageArray();
//TODO: if (getenv("HTTP_ACCEPT_LANGUAGE") != available language) AND (config lang != en) ) {
// then use config lang
// }
//
?>
