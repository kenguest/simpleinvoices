<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
#table
include("./include/include_main.php");
include("./include/validation.php");
echo <<<EOD
<title>{$title} :: {$LANG_customer_details}</title>
<link rel="stylesheet" type="text/css" href="themes/{$theme}/tables.css" />

EOD;
jsBegin();
jsFormValidationBegin("frmpost");
jsValidateRequired("prod_description",$LANG_product_description);
jsValidateifNum("prod_unit_price",$LANG_product_unit_price);
jsFormValidationEnd();
jsEnd();


#get the invoice id
$product_id = $_GET[submit];


#Info from DB print
$conn = mysql_connect("$db_host","$db_user","$db_password");
mysql_select_db("$db_name",$conn);



#customer query
$print_product = "SELECT * FROM si_products WHERE prod_id = $product_id";
$result_print_product = mysql_query($print_product, $conn) or die(mysql_error());


while ($Array = mysql_fetch_array($result_print_product) ) {
	$prod_idField = $Array['prod_id'];
	$prod_descriptionField = $Array['prod_description'];
	$prod_custom_field1Field = $Array['prod_custom_field1'];
	$prod_custom_field2Field = $Array['prod_custom_field2'];
	$prod_custom_field3Field = $Array['prod_custom_field3'];
	$prod_custom_field4Field = $Array['prod_custom_field4'];
	$prod_enabledField = $Array['prod_enabled'];
	$prod_notesField = $Array['prod_notes'];
	$prod_unit_priceField = $Array['prod_unit_price'];

	if ($prod_enabledField == 1) {
		$wording_for_enabled = $wording_for_enabledField;
	} else {
		$wording_for_enabled = $wording_for_disabledField;
	}
};

#get custom field labels
$prod_custom_field_label1 = get_custom_field_label(product_cf1,'.');
$prod_custom_field_label2 = get_custom_field_label(product_cf2,'.');
$prod_custom_field_label3 = get_custom_field_label(pruduct_cf3,'.');
$prod_custom_field_label4 = get_custom_field_label(product_cf4,'.');


if ($_GET['action'] == "view") {

	$display_block = <<<EOD

	<div id="header"><b>{$LANG_products}</b> ::
	<a href="?submit={$prod_idField}&action=edit">{$LANG_edit}</a></div>
	
	<table align="center">
	<tr>
		<td class="details_screen">{$LANG_product_id}</td><td>{$prod_idField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_product_description}</td>
		<td>{$prod_descriptionField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_product_unit_price}</td>
		<td>{$prod_unit_priceField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label1} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td>{$prod_custom_field1Field}</td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label2} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td>{$prod_custom_field2Field}</td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label3} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td>{$prod_custom_field3Field}</td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label4} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td>{$prod_custom_field4Field}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_notes}</td><td>{$prod_notesField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_product_enabled}</td>
		<td>{$wording_for_enabled}</td>
	</tr>
	</table>

EOD;

$footer = <<<EOD

<div id="footer"><a href="?submit={$prod_idField}&action=edit">{$LANG_edit}</a></div>

EOD;
}

else if ($_GET['action'] == "edit") {

#do the product enabled/disblaed drop down
$display_block_enabled = "<select name=\"prod_enabled\">
<option value=\"$prod_enabledField\" selected style=\"font-weight: bold\">$wording_for_enabled</option>
<option value=\"1\">$wording_for_enabledField</option>
<option value=\"0\">$wording_for_disabledField</option>
</select>";

$display_block = <<<EOD
	<div id="header"><b>{$LANG_products}</b></div>

	<table align="center">
	<tr>
		<td class="details_screen">{$LANG_product_id}</td><td>{$prod_idField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_product_description}</td>
		<td><input type="text" name="prod_description" size="50" value="{$prod_descriptionField}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_product_unit_price}</td>
		<td><input type="text" name="prod_unit_price" size="25" value="{$prod_unit_priceField}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label1} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td><input type="text" name="prod_custom_field1" size="50" value="{$prod_custom_field1Field}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label2} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td><input type="text" name="prod_custom_field2" size="50" value="{$prod_custom_field2Field}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label3} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td><input type="text" name="prod_custom_field3" size="50" value="{$prod_custom_field3Field}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$prod_custom_field_label4} <a href="./documentation/text/custom_fields.html" class="greybox">*</a></td>
		<td><input type="text" name="prod_custom_field4" size="50" value="{$prod_custom_field4Field}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_notes}</td>
		<td><textarea name="prod_notes" rows="8" cols="50">{$prod_notesField}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_product_enabled}</td><td>{$display_block_enabled}</td>
	</tr>
	</table>

EOD;

$footer = <<<EOD

<p><input type="submit" name="cancel" value="{$LANG_cancel}" />
<input type="submit" name="save_product" value="{$LANG_save_product}" />
<input type="hidden" name="op" value="edit_product" /></p>

EOD;
}

?>
<script type="text/javascript" src="niftycube.js"></script>
<script type="text/javascript">
window.onload=function(){
Nifty("div#container");
Nifty("div#content,div#nav","same-height small");
Nifty("div#header,div#footer","small");
}
</script>
<script language="javascript" type="text/javascript" src="include/jquery.js"></script>
<script language="javascript" type="text/javascript" src="include/jquery.greybox.js"></script>
<script language="javascript" type="text/javascript" src="include/jquery.greybox.conf.js"></script>
<script language="javascript" type="text/javascript" src="include/tiny_mce/tiny_mce_src.js"></script>
<script language="javascript" type="text/javascript" src="include/tiny-mce.conf.js"></script>
</head>
<body>

<?php
$mid->printMenu('hormenu1');
$mid->printFooter();
echo <<<EOD

<br>
<FORM name="frmpost" ACTION="insert_action.php?submit={$_GET['submit']}"
 METHOD="POST" onsubmit="return frmpost_Validator(this)">
<div id="container">
{$display_block}
<div id="footer">
{$footer}

EOD;
?>
</div>
</div>
</form>
</body>
</html>
