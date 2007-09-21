<?php

$conn = mysql_connect( $db_host, $db_user, $db_password );
mysql_select_db( $db_name, $conn );



/**
 * Used for logging all queries
 */
function mysqlQuery($sqlQuery) {
	$logging = 0; //Set to 1 to enable (for testing...)
	$pattern = "/[^a-z]*SELECT|select/";
	$userid = 1;

	if($logging && (preg_match($pattern,$sqlQuery) == 0)) {
		$sql = "INSERT INTO  `si_log` (  `id` ,  `timestamp` ,  `userid` ,  `sqlquerie` ) VALUES (NULL , CURRENT_TIMESTAMP ,  '$userid',  '". addslashes ($sqlQuery)."');";
		mysql_query($sql);
	}
	$result = mysql_query($sqlQuery);
	return $result;
}

/**
*	Custom Querys
**/


function getCustomer($id) {
	global $tb_prefix;
	$print_customer = "SELECT * FROM {$tb_prefix}customers WHERE id = $id";
	$result_print_customer = mysqlQuery($print_customer) or die(mysql_error());
	return mysql_fetch_array($result_print_customer);
}



function getBiller($id) {
	global $tb_prefix;
	global $LANG;
	$print_biller = "SELECT * FROM {$tb_prefix}biller WHERE id = $id";
	$result_print_biller = mysqlQuery($print_biller) or die(mysql_error());
	$biller = mysql_fetch_array($result_print_biller);
	$biller['wording_for_enabled'] = $biller['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $biller;
}

function getPreference($id) {
	global $tb_prefix;
	global $LANG;
	$print_preferences = "SELECT * FROM {$tb_prefix}preferences WHERE pref_id = $id";
	$result_print_preferences  = mysqlQuery($print_preferences) or die(mysql_error());
	$preference = mysql_fetch_array($result_print_preferences);
	$preference['enabled'] = $preference['pref_enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $preference;
}

function getSQLPatches() {
	global $tb_prefix;
	$sql = "SELECT * FROM {$tb_prefix}sql_patchmanager ORDER BY sql_release";
	$query = mysqlQuery($sql) or die(mysql_error());

	$patches = null;

	for($i=0;$patch = mysql_fetch_array($query);$i++) {
		$patches[$i] = $patch;
	}
	return $patches;
}

function getPreferences() {
	global $tb_prefix;
	global $LANG;

	$sql = "SELECT * FROM {$tb_prefix}preferences ORDER BY pref_description";
	$query  = mysqlQuery($sql) or die(mysql_error());

	$preferences = null;

	for($i=0;$preference = mysql_fetch_array($query);$i++) {

  		if ($preference['pref_enabled'] == 1) {
  			$preference['enabled'] = $LANG['enabled'];
  		} else {
  			$preference['enabled'] = $LANG['disabled'];
  		}

		$preferences[$i] = $preference;
	}

	return $preferences;
}


function getActivePreferences() {
	global $tb_prefix;

	$sql = "SELECT * FROM {$tb_prefix}preferences WHERE pref_enabled ORDER BY pref_description";
	$query  = mysqlQuery($sql) or die(mysql_error());

	$preferences = null;

	for($i=0;$preference = mysql_fetch_array($query);$i++) {
		$preferences[$i] = $preference;
	}

	return $preferences;
}

function getCustomFieldLabels() {
	global $LANG;
	global $tb_prefix;

	$sql = "SELECT * FROM {$tb_prefix}custom_fields ORDER BY cf_custom_field";
	$result = mysqlQuery($sql) or die(mysql_error());

	for($i=0;$customField = mysql_fetch_array($result);$i++) {
		$customFields[$customField['cf_custom_field']] = $customField['cf_custom_label'];

		if($customFields[$customField['cf_custom_field']] == null) {
			//If not set, don't show...
			$customFields[$customField['cf_custom_field']] = $LANG["custom_field"].' '.($i%4+1);
		}
	}

	return $customFields;
}


function getBillers() {
	global $tb_prefix;
	global $LANG;

	$sql = "SELECT * FROM {$tb_prefix}biller ORDER BY name";
	$query  = mysqlQuery($sql) or die(mysql_error());

	$billers = null;

	for($i=0;$biller = mysql_fetch_array($query);$i++) {

  		if ($biller['enabled'] == 1) {
  			$biller['enabled'] = $LANG['enabled'];
  		} else {
  			$biller['enabled'] = $LANG['disabled'];
  		}
		$billers[$i] = $biller;
	}

	return $billers;
}

function getActiveBillers() {
	global $tb_prefix;
	$sql = "SELECT * FROM {$tb_prefix}biller WHERE enabled != 0 ORDER BY name";
	$query = mysqlQuery($sql) or die(mysql_error());

	$billers = null;

	for($i=0;$biller = mysql_fetch_array($query);$i++) {
		$billers[$i] = $biller;
	}

	return $billers;
}



function getTaxRate($id) {
	global $tb_prefix;
	global $LANG;

	$sql = "SELECT * FROM {$tb_prefix}tax WHERE tax_id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());

	$tax = mysql_fetch_array($query);
	$tax['enabled'] = $tax['tax_enabled'] == 1 ? $LANG['enabled']:$LANG['disabled'];

	return $tax;
}

function getPaymentType($id) {
	global $tb_prefix;
	global $LANG;

	$sql = "SELECT * FROM {$tb_prefix}payment_types WHERE pt_id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	$paymentType = mysql_fetch_array($query);
	$paymentType['enabled'] = $paymentType['pt_enabled']==1?$LANG['enabled']:$LANG['disabled'];

	return $paymentType;
}

function getPaymentTypes() {
	global $tb_prefix;
	global $LANG;

	$sql = "SELECT * FROM {$tb_prefix}payment_types ORDER BY pt_description";
	$query = mysqlQuery($sql) or die(mysql_error());

	$paymentTypes = null;

	for ($i=0;$paymentType = mysql_fetch_array($query);$i++) {
		if ($paymentType['pt_enabled'] == 1) {
			$paymentType['pt_enabled'] = $LANG['enabled'];
		} else {
			$paymentType['pt_enabled'] = $LANG['disabled'];
		}
		$paymentTypes[$i]=$paymentType;
	}

	return $paymentTypes;
}

function getProduct($id) {
	global $tb_prefix;
	global $LANG;
	$sql = "SELECT * FROM {$tb_prefix}products WHERE id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	$product = mysql_fetch_array($query);
	$product['wording_for_enabled'] = $product['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $product;
}

function getProducts() {

	global $tb_prefix;
	global $LANG;

	$sql = "SELECT * FROM {$tb_prefix}products ORDER BY reference";
	$query = mysqlQuery($sql) or die(mysql_error());

	$products = null;

	for($i=0;$product = mysql_fetch_array($query);$i++) {

		if ($product['enabled'] == 1) {
			$product['enabled'] = $LANG['enabled'];
		} else {
			$product['enabled'] = $LANG['disabled'];
		}

		$products[$i] = $product;
	}

	return $products;
}

function getActiveProducts() {

	global $tb_prefix;

	$sql = "SELECT * FROM {$tb_prefix}products WHERE enabled != 0 ORDER BY reference";
	$query = mysqlQuery($sql) or die(mysql_error());

	$products = null;

	for($i=0;$product = mysql_fetch_array($query);$i++) {
		$products[$i] = $product;
	}

	return $products;
}


function getTaxes() {
	global $tb_prefix;
	global $LANG;

	$sql = "SELECT * FROM {$tb_prefix}tax ORDER BY tax_description";
	$query = mysqlQuery($sql) or die(mysql_error());

	$taxes = null;

	for($i=0;$tax = mysql_fetch_array($query);$i++) {
		if ($tax['tax_enabled'] == 1) {
			$tax['enabled'] = $LANG['enabled'];
		} else {
			$tax['enabled'] = $LANG['disabled'];
		}

		$taxes[$i] = $tax;
	}

	return $taxes;
}


function getDefaultCustomer() {
	global $tb_prefix;
	$sql = "SELECT *,c.name AS name FROM {$tb_prefix}customers c, {$tb_prefix}system_defaults s WHERE ( s.name = 'customer' AND c.id = s.value)";
	$query = mysqlQuery($sql) or die(mysql_error());
	return mysql_fetch_array($query);
}

function getDefaultPaymentType() {
	global $tb_prefix;
	$sql = "SELECT * FROM {$tb_prefix}payment_types p, {$tb_prefix}system_defaults s WHERE ( s.name = 'payment_type' AND p.pt_id = s.value)";
	$query = mysqlQuery($sql) or die(mysql_error());
	return mysql_fetch_array($query);
}

function getDefaultPreference() {
	global $tb_prefix;
	$sql = "SELECT * FROM {$tb_prefix}preferences p, {$tb_prefix}system_defaults s WHERE ( s.name = 'preference' AND p.pref_id = s.value)";
	$query = mysqlQuery($sql) or die(mysql_error());
	return mysql_fetch_array($query);
}

function getDefaultBiller() {
	global $tb_prefix;
	$sql = "SELECT *,b.name AS name FROM {$tb_prefix}biller b, {$tb_prefix}system_defaults s WHERE ( s.name = 'biller' AND b.id = s.value )";
	$query = mysqlQuery($sql) or die(mysql_error());
	return mysql_fetch_array($query);
}


function getDefaultTax() {
	global $tb_prefix;
	$sql = "SELECT * FROM {$tb_prefix}tax t, {$tb_prefix}system_defaults s WHERE (s.name = 'tax' AND t.tax_id = s.value)";
	$query = mysqlQuery($sql) or die(mysql_error());
	return mysql_fetch_array($query);
}

function getNextInvoiceNumber() {
	global $tb_prefix;

	$sql = "SELECT `invoice_number` FROM {$tb_prefix}invoices ORDER BY `invoice_number` DESC LIMIT 1";
	$query = mysqlQuery($sql) or die(mysql_error());
	$last = mysql_result($query, 0);	// 00010A0012
	$prefix = substr($last, 0, 6);
	$number = substr($last, -4);
	$number++;
	$invoice_number = $prefix . str_pad($number, 4, 0, STR_PAD_LEFT);
	return $invoice_number;
}

function get_invoice_lines($id){
	global $tb_prefix;
	$lines_sql = "SELECT * FROM {$tb_prefix}invoice_lines WHERE invoice_id =$id";
	$result = mysqlQuery($lines_sql);
	$invoice_lines = array();
	while($row = mysql_fetch_array($result)){
		$line['qty'] = $row['quantity'];
		$line['price'] = $row['unit_price'];
			$product_sql = "SELECT * FROM {$tb_prefix}products WHERE id ={$row['product_id']}";
			$result_product = mysqlQuery($product_sql);
		$line['product'] = mysql_fetch_array($result_product);

		$invoice_lines[] = $line;
	}
	return $invoice_lines;
}

function getInvoiceItems($id) {
	global $tb_prefix;
	$sql = "SELECT * FROM {$tb_prefix}invoice_lines WHERE invoice_id =$id";
	$query = mysqlQuery($sql);

	$invoiceItems = null;

	for($i=0;$invoiceItem = mysql_fetch_array($query);$i++) {

		$invoiceItem['quantity_formatted'] = number_format($invoiceItem['quantity'],2);
		$invoiceItem['unit_price'] = number_format($invoiceItem['unit_price'],2);
		#$invoiceItem['tax_amount'] = number_format($invoiceItem['tax_amount'],2);
		#$invoiceItem['gross_total'] = number_format($invoiceItem['gross_total'],2);
		#$invoiceItem['total'] = number_format($invoiceItem['total'],2);

		$sql = "SELECT * FROM {$tb_prefix}products WHERE id = {$invoiceItem['product_id']}";
		$query2 = mysqlQuery($sql) or die(mysql_error());
		$invoiceItem['product'] = mysql_fetch_array($query2);

		$invoiceItems[$i] = $invoiceItem;
	}

	return $invoiceItems;
}


function getSystemDefaults() {
	global $tb_prefix;
	$print_defaults = "SELECT * FROM {$tb_prefix}system_defaults";
	$result_print_defaults = mysqlQuery($print_defaults) or die(mysql_error());

	$defaults = null;
	$default = null;


	while($default = mysql_fetch_array($result_print_defaults)) {
		$defaults["$default[name]"] = $default['value'];
	}

	return $defaults;
}

function updateDefault($name,$value) {
	global $tb_prefix;
	$sql = "UPDATE {$tb_prefix}system_defaults SET `value` =  '$value' WHERE  `name` = '$name'";
	//echo $sql;
	if (mysqlQuery($sql)) {
		return true;
	}
	return false;
}

function getInvoiceType($id) {
	global $tb_prefix;
	$sql = "SELECT inv_ty_description FROM {$tb_prefix}invoice_type WHERE inv_ty_id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	return mysql_fetch_array($query);
}

function insertBiller() {
	global $tb_prefix;
	$sql = "INSERT into
			{$tb_prefix}biller
		VALUES
			(
				'',
				'$_POST[name]',
				'$_POST[street_address]',
				'$_POST[street_address2]',
				'$_POST[city]',
				'$_POST[state]',
				'$_POST[zip_code]',
				'$_POST[country]',
				'$_POST[phone]',
				'$_POST[mobile_phone]',
				'$_POST[fax]',
				'$_POST[email]',
				'$_POST[logo]',
				'$_POST[footer]',
				'$_POST[notes]',
				'$_POST[custom_field1]',
				'$_POST[custom_field2]',
				'$_POST[custom_field3]',
				'$_POST[custom_field4]',
				'$_POST[enabled]'
			 )";

	return mysqlQuery($sql);

}

function updateBiller() {
	global $tb_prefix;
	$sql = "UPDATE
				{$tb_prefix}biller
			SET
				name = '$_POST[name]',
				street_address = '$_POST[street_address]',
				street_address2 = '$_POST[street_address2]',
				city = '$_POST[city]',
				state = '$_POST[state]',
				zip_code = '$_POST[zip_code]',
				country = '$_POST[country]',
				phone = '$_POST[phone]',
				mobile_phone = '$_POST[mobile_phone]',
				fax = '$_POST[fax]',
				email = '$_POST[email]',
				logo = '$_POST[logo]',
				footer = '$_POST[footer]',
				notes = '$_POST[notes]',
				custom_field1 = '$_POST[custom_field1]',
				custom_field2 = '$_POST[custom_field2]',
				custom_field3 = '$_POST[custom_field3]',
				custom_field4 = '$_POST[custom_field4]',
				enabled = '$_POST[enabled]'
			WHERE
				id = '$_GET[submit]'";
	return mysqlQuery($sql);
}

function updateCustomer() {
	global $tb_prefix;

// TODO: hay que agregar el website

	$sql = "
			UPDATE
				{$tb_prefix}customers
			SET
				name = '$_POST[name]',
				customer_short_id = '$_POST[customer_short_id]',
				attention = '$_POST[attention]',
				street_address = '$_POST[street_address]',
				street_address2 = '$_POST[street_address2]',
				shipping_address = '$_POST[shipping_address]',
				shipping_address2 = '$_POST[shipping_address2]',
				shipping_city = '$_POST[shipping_city]',
				shipping_state = '$_POST[shipping_state]',
				shipping_zip_code = '$_POST[shipping_zip_code]',
				shipping_country = '$_POST[shipping_country]',
				shipping_phone = '$_POST[shipping_phone]',
				shipping_fax = '$_POST[shipping_fax]',
				shipping_email = '$_POST[shipping_email]',
				city = '$_POST[city]',
				state = '$_POST[state]',
				zip_code = '$_POST[zip_code]',
				country = '$_POST[country]',
				phone = '$_POST[phone]',
				mobile_phone = '$_POST[mobile_phone]',
				fax = '$_POST[fax]',
				email = '$_POST[email]',
				website = '$_POST[website]',
				notes = '$_POST[notes]',
				enabled = '$_POST[enabled]'
			WHERE
				id = " . $_GET['submit'];

	return mysqlQuery($sql);
}

function insertCustomer() {

	// TODO: hay que agregar el website
	global $tb_prefix;
	extract( $_POST );
	$sql = "INSERT INTO {$tb_prefix}customers VALUES (
	'',
	'$customer_short_id',
	'$attention',
	'$name',
	'$street_address',
	'$street_address2',
	'$city',
	'$state',
	'$zip_code',
	'$country',
	'$phone',
	'$mobile_phone',
	'$fax',
	'$email',
	'$website',
	'$shipping_address',
	'$shipping_address2',
	'$shipping_city',
	'$shipping_state',
	'$shipping_zip_code',
	'$shipping_country',
	'$shipping_phone',
	'$shipping_fax',
	'$shipping_email',
	'$notes',
	'$enabled')";

	return mysqlQuery($sql);

}

function insert_vendor() {
	global $tb_prefix;
	extract( $_POST );
	$sql = "INSERT INTO {$tb_prefix}vendors VALUES (
	'',
	'$attention',
	'$name',
	'$street_address',
	'$street_address2',
	'$city',
	'$state',
	'$zip_code',
	'$country',
	'$phone',
	'$mobile_phone',
	'$fax',
	'$email',
	'$website',
	'$notes',
	'$enabled')";
	return mysqlQuery($sql); // true or false
}



function getInvoices(&$query) {
	global $config;
	$invoice = null;

	if($invoice =  mysql_fetch_array($query)) {

		$invoice['calc_date'] = date( 'Y-m-d', strtotime( $invoice['date'] ) );
		$invoice['date'] = date( $config['date_format'], strtotime( $invoice['date'] ) );

		#invoice total total - start
		$invoice['total'] = calc_invoice_total($invoice['id']);
		$invoice['total_format'] = number_format($invoice['total'],2);
		#invoice total total - end

		#amount paid calc - start
		$invoice['paid'] = calc_invoice_paid($invoice['id']);
		$invoice['paid_format'] = number_format($invoice['paid'],2);
		#amount paid calc - end

		#amount owing calc - start
		$invoice['owing'] = $invoice['total'] - $invoice['paid'];
		$invoice['owing_format'] = number_format($invoice['total'] - $invoice['paid'],2);
		#amount owing calc - end
	}
	return $invoice;
}

function getCustomerInvoices($id) {
	global $tb_prefix;
	$invoices = null;

	$sql = "SELECT * FROM {$tb_prefix}invoices WHERE customer_id =$id  ORDER BY id DESC";
	$query = mysqlQuery($sql) or die(mysql_error());

	for($i = 0;$invoice = getInvoices($query);$i++) {
		$invoices[$i] = $invoice;
	}

	return $invoices;

}

function getCustomers() {

	global $LANG;
	global $tb_prefix;
	$customer = null;

	$sql = "SELECT * FROM {$tb_prefix}customers ORDER BY name";
	$result = mysqlQuery($sql) or die(mysql_error());

	$customers = null;

	for($i=0;$customer = mysql_fetch_array($result);$i++) {
		if ($customer['enabled'] == 1) {
			$customer['enabled'] = $LANG['enabled'];
		} else {
			$customer['enabled'] = $LANG['disabled'];
		}

		#invoice total calc - start
		$customer['total'] = calc_customer_total($customer['id']);
		#invoice total calc - end

		#amount paid calc - start
		$customer['paid'] = calc_customer_paid($customer['id']);
		#amount paid calc - end

		#amount owing calc - start
		$customer['owing'] = $customer['total'] - $customer['paid'];

		#amount owing calc - end
		$customers[$i] = $customer;

	}

	return $customers;
}

function get_vendors(){
	/* TODO: implementar el tema del balance aca*/
	global $tb_prefix;
	$vendors_sql = "SELECT * FROM {$tb_prefix}vendors ORDER BY name";
	$result = mysqlQuery($vendors_sql) or die(mysql_error());
	$vendors = null;
	while($row = mysql_fetch_array($result)){
		$vendors[] = $row;
	}
	return $vendors;
}

function getActiveCustomers() {

	global $LANG;
	global $tb_prefix;

	$sql = "SELECT * FROM {$tb_prefix}customers WHERE enabled != 0 ORDER BY name";
	$result = mysqlQuery($sql) or die(mysql_error());

	$customers = null;

	for($i=0;$customer = mysql_fetch_array($result);$i++) {
		$customers[$i] = $customer;
	}

	return $customers;
}

//in this file are functions for all sql queries
?>
