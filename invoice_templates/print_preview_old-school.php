<?php
#table
include('../include/include_print.php');

#get the invoice id
$master_invoice_id = $_GET['submit'];


#Info from DB print
$conn = mysql_connect( $db_host, $db_user, $db_password );
mysql_select_db( $db_name, $conn );


#master invoice id select
$print_master_invoice_id = "SELECT * FROM si_invoices WHERE inv_id =$master_invoice_id";
$result_print_master_invoice_id  = mysql_query($print_master_invoice_id , $conn) or die(mysql_error());

while ($Array_master_invoice = mysql_fetch_array($result_print_master_invoice_id)) {
                $inv_idField = $Array_master_invoice['inv_id'];
                $inv_biller_idField = $Array_master_invoice['inv_biller_id'];
                $inv_customer_idField = $Array_master_invoice['inv_customer_id'];
                $inv_typeField = $Array_master_invoice['inv_type'];
                $inv_preferenceField = $Array_master_invoice['inv_preference'];
                $inv_dateField = date( $config['date_format'], strtotime( $Array_master_invoice['inv_date'] ) );
                $inv_noteField = $Array_master_invoice['inv_note'];

};

/* 
old date code
                $inv_dateField = date( $config['date_format'], strtotime( $Array_master_invoice['inv_date'] ) );

stuff to implement - talk to raymond about this

		$inv_dateField = date( $config['date_format'], strtotime( $Array_master_invoice['inv_date'] ) );
*/

/*
$inv_it_total_tax_amount = $inv_it_gross_totalField / $inv_it_taxField  ;
*/


#invoice_type query

        $sql_invoice_type = "select inv_ty_description from si_invoice_type where inv_ty_id = $inv_typeField ";
        $result_invoice_type = mysql_query($sql_invoice_type, $conn) or die(mysql_error());

        while ($invoice_typeArray = mysql_fetch_array($result_invoice_type)) {
                $inv_ty_descriptionField = $invoice_typeArray['inv_ty_description'];
	};

#customer query
$print_customer = "SELECT * FROM si_customers WHERE c_id = $inv_customer_idField";
$result_print_customer = mysql_query($print_customer, $conn) or die(mysql_error());

#biller query
$print_biller = "SELECT * FROM si_biller WHERE b_id = $inv_biller_idField";
$result_print_biller = mysql_query($print_biller, $conn) or die(mysql_error());

while ($Array = mysql_fetch_array($result_print_customer)) {
                $c_idField = $Array['c_id'];
                $c_attentionField = $Array['c_attention'];
                $c_nameField = $Array['c_name'];
                $c_street_addressField = $Array['c_street_address'];
                $c_cityField = $Array['c_city'];
                $c_stateField = $Array['c_state'];
                $c_zip_codeField = $Array['c_zip_code'];
                $c_countryField = $Array['c_country'];
		$c_phoneField = $Array['c_phone'];
		$c_faxField = $Array['c_fax'];
		$c_emailField = $Array['c_email'];
};
while ($billerArray = mysql_fetch_array($result_print_biller)) {
                $b_idField = $billerArray['b_id'];
                $b_nameField = $billerArray['b_name'];
                $b_street_addressField = $billerArray['b_street_address'];
                $b_cityField = $billerArray['b_city'];
                $b_stateField = $billerArray['b_state'];
                $b_zip_codeField = $billerArray['b_zip_code'];
                $b_countryField = $billerArray['b_country'];
                $b_phoneField = $billerArray['b_phone'];
                $b_mobile_phoneField = $billerArray['b_mobile_phone'];
                $b_faxField = $billerArray['b_fax'];
                $b_emailField = $billerArray['b_email'];
                $b_co_logoField = $billerArray['b_co_logo'];
                $b_co_footerField = $billerArray['b_co_footer'];
};


#preferences query
$print_preferences = "SELECT * FROM si_preferences where pref_id = $inv_preferenceField ";
$result_print_preferences  = mysql_query($print_preferences, $conn) or die(mysql_error());

while ($Array_preferences = mysql_fetch_array($result_print_preferences)) {
                $pref_idField = $Array_preferences['pref_id'];
                $pref_descriptionField = $Array_preferences['pref_description'];
                $pref_currency_signField = $Array_preferences['pref_currency_sign'];
                $pref_inv_headingField = $Array_preferences['pref_inv_heading'];
                $pref_inv_wordingField = $Array_preferences['pref_inv_wording'];
                $pref_inv_detail_headingField = $Array_preferences['pref_inv_detail_heading'];
                $pref_inv_detail_lineField = $Array_preferences['pref_inv_detail_line'];
                $pref_inv_payment_methodField = $Array_preferences['pref_inv_payment_method'];
                $pref_inv_payment_line1_nameField = $Array_preferences['pref_inv_payment_line1_name'];
                $pref_inv_payment_line1_valueField = $Array_preferences['pref_inv_payment_line1_value'];
                $pref_inv_payment_line2_nameField = $Array_preferences['pref_inv_payment_line2_name'];
                $pref_inv_payment_line2_valueField = $Array_preferences['pref_inv_payment_line2_value'];

};

#logo field support - if not logo show nothing else show logo

if (!empty($b_co_logoField)) {
	$logo_block = "
        <tr>
                <td colspan=6><IMG src=../logo/$b_co_logoField border=0 hspace=0 align=right></td>
        </tr>
 ";
}
if (empty($b_co_logoField)) {
        $logo_block = "
        <tr>
                <td colspan=6><IMG src=../logo/_default_blank_logo.png border=0 hspace=0 align=right></td>
        </tr>
 ";
}
#end logo section
	


$display_block_top =  "
	
	<table align=center>
	<tr>
		<th colspan=6 align=center>$pref_inv_headingField</th>
	</tr>
	$logo_block 
	<tr>
		<td nowrap><b>$b_nameField</b></td><td colspan=7 ></td>
	</tr>
	<tr>
		<td nowrap>$b_street_addressField,</td><td>Ph: $b_phoneField</td><td></td><td><b>$pref_inv_wordingField $LANG_number_short</b></td><td>$inv_idField</td><td></td>
	</tr>	
	<tr>
		<td nowrap>$b_cityField,</td><td>$LANG_mobile_short: $b_mobile_phoneField</td><td></td><td><b>$pref_inv_wordingField $LANG_date</b></td><td colspan=2>$inv_dateField</td>

	</tr>	
	<tr>
		<td nowrap>$b_stateField, $b_zip_codeField</td><td>$LANG_fax: $b_faxField</td>
	</tr>	
	<tr>
		<td nowrap>$b_countryField</td><td>$LANG_email: $b_emailField</td>
	</tr>	
	<tr>
		<td colspan=5><br><br></td>
	</tr>	
	<tr>
		<td><i>$LANG_customer</i></td><td></td>
	</tr>	
	<tr>
		<td colspan=2>$c_nameField</td><td colspan=4></td>
	</tr>
	<tr>
		<td nowrap>$LANG_attention_short: $c_attentionField,</td>
	</tr>

	<tr>
		<td nowrap>$c_street_addressField,</td><td>$LANG_phone_short: $c_phoneField</td><td colspan=4></td>
	</tr>	
	<tr>
		<td nowrap>$c_cityField,</td><td>$LANG_fax: $c_faxField</td><td colspan=4></td>
	</tr>	
	<tr>
		<td nowrap>$c_stateField, $c_zip_codeField</td><td colspan=3>$LANG_email: $c_emailField</td><td></td>
	</tr>	
	<tr>
		<td colspan=6>$c_countryField</td>
	</tr>	

";

#PRINT DETAILS FOR THE TOTAL STYLE INVOICE

if ($_GET[invoice_style] === 'Total') {
        #invoice total layout - no quantity

#get all the details for the total style
	#items invoice id select
	$print_master_invoice_items = "SELECT * FROM si_invoice_items WHERE  inv_it_invoice_id =$master_invoice_id";
	$result_print_master_invoice_items = mysql_query($print_master_invoice_items, $conn) or die(mysql_error());


	while ($Array_master_invoice_items = mysql_fetch_array($result_print_master_invoice_items)) {
                $inv_it_idField = $Array_master_invoice_items['inv_it_id'];
                $inv_it_invoice_idField = $Array_master_invoice_items['inv_it_invoice_id'];
                $inv_it_quantityField = $Array_master_invoice_items['inv_it_quantity'];
                $inv_it_product_idField = $Array_master_invoice_items['inv_it_product_id'];
                $inv_it_unit_priceField = $Array_master_invoice_items['inv_it_unit_price'];
                $inv_it_taxField = $Array_master_invoice_items['inv_it_tax'];
                $inv_it_tax_amountField = $Array_master_invoice_items['inv_it_tax_amount'];
                $inv_it_gross_totalField = $Array_master_invoice_items['inv_it_gross_total'];
                $inv_it_descriptionField = $Array_master_invoice_items['inv_it_description'];
                $inv_it_totalField = $Array_master_invoice_items['inv_it_total'];

	};

	#products query
	$print_products = "SELECT * FROM si_products WHERE prod_id = $inv_it_product_idField";
	$result_print_products = mysql_query($print_products, $conn) or die(mysql_error());


	while ($Array = mysql_fetch_array($result_print_products)) { 
                $prod_idField = $Array['prod_id'];
                $prod_descriptionField = $Array['prod_description'];
                $prod_unit_priceField = $Array['prod_unit_price'];

	};

	#invoice_total total query
	$print_invoice_total_total ="select sum(inv_it_total) as total from si_invoice_items where inv_it_invoice_id =$master_invoice_id"; 
	$result_print_invoice_total_total = mysql_query($print_invoice_total_total, $conn) or die(mysql_error());


	while ($Array = mysql_fetch_array($result_print_invoice_total_total)) {
                $invoice_total_totalField = $Array['total'];

	};
	#all the details have bee got now print them to screen

	$display_block_details =  "

	        <tr>
	                <td colspan=6><br><br></td>
        	</tr>
	        <tr>
        	        <td colspan=6><b>$LANG_description</b></td>
	        </tr>
	        <tr>
	                <td colspan=6>$inv_it_descriptionField</td>
        	</tr>
	        <tr>
        	        <td colspan=6><br></td>
	        </tr>
	        <tr>
	                <td></td><td></td><td></td><td><b>$LANG_gross_total</b></td><td><b>$LANG_tax</b></td><td><b>$LANG_total_uppercase</b></td>
        	</tr>
	        <tr>
        	        <td></td><td></td><td></td><td>$pref_currency_signField$inv_it_gross_totalField</td><td>$pref_currency_signField$inv_it_tax_amountField</td><td><u>$pref_currency_signField$inv_it_totalField</u></td>
	        </tr>

        	<tr>
                	<td colspan=6><br><br></td>
	        </tr>
        	<tr>
                	<td colspan=6><b>$pref_inv_detail_headingField</b></td>
	        </tr>
	";	
   

     }

#INVOICE ITEMEISED SECTION

else if ($_GET[invoice_style] === 'Itemised' || $_GET[invoice_style] === 'Consulting' )  {

$display_block_details =  "
        <tr>
                <td colspan=6><br><br></td>
        </tr>
        
        ";

        #show column heading for itemised style
        if ( $_GET['invoice_style'] === 'Itemised' ) {
                $display_block_details .=  "
                <tr>
                        <td><b>$LANG_quantity_short</b></td><td><b>$LANG_description</b></td><td><b>$LANG_unit_price</b><td><b>$LANG_gross_total</b></td><td><b>$LANG_tax</b></td><td><b>$LANG_total_uppercase</b></td>
                </tr>";
        }
        #show column heading for consulting style
        else if ( $_GET['invoice_style'] === 'Consulting' ) {
                $display_block_details .=  "
                <tr>
                        <td><b>$LANG_quantity_short</b></td><td><b>$LANG_items</b></td><td><b>$LANG_unit_price</b><td><b>$LANG_gross_total</b></td><td><b>$LANG_tax</b></td><td><b>$LANG_total_uppercase</b></td>
                </tr>";
        }


	#INVOIVE_ITEMS SECTION
	#items invoice id select
	$print_master_invoice_items = "SELECT * FROM si_invoice_items WHERE  inv_it_invoice_id =$master_invoice_id";
	$result_print_master_invoice_items = mysql_query($print_master_invoice_items, $conn) or die(mysql_error());


	while ($Array_master_invoice_items = mysql_fetch_array($result_print_master_invoice_items)) {
                $inv_it_idField = $Array_master_invoice_items['inv_it_id'];
                $inv_it_invoice_idField = $Array_master_invoice_items['inv_it_invoice_id'];
                $inv_it_quantityField = $Array_master_invoice_items['inv_it_quantity'];
                $inv_it_product_idField = $Array_master_invoice_items['inv_it_product_id'];
                $inv_it_unit_priceField = $Array_master_invoice_items['inv_it_unit_price'];
                $inv_it_taxField = $Array_master_invoice_items['inv_it_tax'];
                $inv_it_tax_amountField = $Array_master_invoice_items['inv_it_tax_amount'];
                $inv_it_gross_totalField = $Array_master_invoice_items['inv_it_gross_total'];
                $inv_it_descriptionField = $Array_master_invoice_items['inv_it_description'];
                $inv_it_totalField = $Array_master_invoice_items['inv_it_total'];
/*
	};
*/
	#products query
	$print_products = "SELECT * FROM si_products WHERE prod_id = $inv_it_product_idField";
	$result_print_products = mysql_query($print_products, $conn) or die(mysql_error());


	while ($Array = mysql_fetch_array($result_print_products)) { 
                $prod_idField = $Array['prod_id'];
                $prod_descriptionField = $Array['prod_description'];
                $prod_unit_priceField = $Array['prod_unit_price'];
/*
	};
*/
	#invoice_total total query
	$print_invoice_total_total ="select sum(inv_it_total) as total from si_invoice_items where inv_it_invoice_id =$master_invoice_id"; 
	$result_print_invoice_total_total = mysql_query($print_invoice_total_total, $conn) or die(mysql_error());


	while ($Array = mysql_fetch_array($result_print_invoice_total_total)) {
                $invoice_total_totalField = $Array['total'];

	#invoice total tax
	$print_invoice_total_tax ="select sum(inv_it_tax_amount) as total_tax from si_invoice_items where inv_it_invoice_id =$master_invoice_id"; 
	$result_print_invoice_total_tax = mysql_query($print_invoice_total_tax, $conn) or die(mysql_error());

	while ($Array_tax = mysql_fetch_array($result_print_invoice_total_tax)) {
                $invoice_total_taxField = $Array_tax['total_tax'];


/*
	};
*/
	#END INVOICE ITEMS SECTION


	#calculation for each line item
	$gross_total_itemised = $prod_unit_priceField * $inv_it_quantityField ;
	/*
	$tax_per_item =  $prod_unit_priceField / $inv_it_taxField;
	$total_tax_per_line = $tax_per_item  * $inv_it_quantityField ;
	$total_per_line = $gross_total_itemised + $total_tax_per_line ;
	*/

        #MERGE ITEMISED AND CONSULTING HERE
        #PRINT the line items
        #show the itemised invoice
        if ( $_GET['invoice_style'] === 'Itemised' ) {

                $display_block_details .=  "
                <tr>
                        <td>$inv_it_quantityField</td><td>$prod_descriptionField</td><td>$pref_currency_signField$inv_it_unit_priceField</td><td>$pref_currency_signField$inv_it_gross_totalField</td><td>$pref_currency_signField$inv_it_tax_amountField</td><td>$pref_currency_signField$inv_it_totalField</td>
                </tr>
                ";
        }
        #show the consulting invoice
        else if ( $_GET['invoice_style'] === 'Consulting' ) {

                

                $display_block_details .=  "
                <tr>
                        <td>$inv_it_quantityField</td><td>$prod_descriptionField</td></tr><tr><td></td><td colspan=6><i>$LANG_description: </i>$inv_it_descriptionField</td></tr><tr><td></td><td></td><td>$pref_currency_signField$inv_it_unit_priceField</td><td>$pref_currency_signField$inv_it_gross_totalField</td><td>$pref_currency_signField$inv_it_tax_amountField</td><td>$pref_currency_signField$inv_it_totalField</td>
                </tr>
		<tr>
			<td><br></td>
		</tr>
                ";
        }
	#End merge code here


	};
	};
	};
	};


        #if itemised style show the invoice note field - START
	if ( $_GET['invoice_style'] === 'Itemised' && !empty($inv_noteField) OR 'Consulting' && !empty($inv_noteField)) {

                $display_block_details .=  "
                        <tr>
                                <td></td>
                        </tr>
                        <tr>
                                <td><i>$LANG_note:</i></td>
                        </tr>
                        <tr>
                                <td colspan=6>$inv_noteField</td>
                        </tr>
                ";
        }
        #END - if itemised style show the invoice note field



	$display_block_details .=  "
	<!--
        <tr>
                <td colspan=3 align=left>Totals</td><td>$pref_currency_signField$invoice_total_taxField</td><td><u>$pref_currency_signField$invoice_total_taxField</u></td><td><u>$pref_currency_signField$invoice_total_totalField</u></td>

        </tr>
	-->
	<tr>
		<td colspan=6><br></td>
	</tr>	

        <tr>
                <td colspan=3></td><td align=left colspan=2>$LANG_tax_total</td><td>$pref_currency_signField$invoice_total_taxField</td>
        </tr>
	<tr><td><br></td>
	</tr>
        <tr>
                <td colspan=3></td><td align=left colspan=2><b>$pref_inv_wordingField $pp_invoice_amount</b></td><td><u>$pref_currency_signField$invoice_total_totalField</u></td>
        </tr>


	<tr>
		<td colspan=6><br><br></td>
	</tr>	
	<tr>
		<td colspan=6><b>$pref_inv_detail_headingField</b></td>
	</tr>
";
}

#END INVOICE ITEMEISED/CONSULTING SECTION

$display_block_bottom =  "
        <tr>
                <td colspan=6><i>$pref_inv_detail_lineField</i></td>
        </tr>
	<tr>
		<td colspan=6>$pref_inv_payment_methodField</td>
        <tr>
                <td>$pref_inv_payment_line1_nameField</td><td colspan=5>$pref_inv_payment_line1_valueField</td>
        </tr>
        <tr>
                <td>$pref_inv_payment_line2_nameField</td><td colspan=5>$pref_inv_payment_line2_valueField</td>
        </tr>
        </table>
	<br><br>
	<div style=font-size:8pt align=center >$b_co_footerField
	</div>

";

/* The Export code - supports any file extensions - excel/word/open office - what reads html */
if (isset($_GET['export'])) {
$file_extension = $_GET['export'];
header("Content-type: application/octet-stream");
/*header("Content-type: application/x-msdownload");*/
header("Content-Disposition: attachment; filename=$pref_inv_headingField$inv_idField.$file_extension");
header("Pragma: no-cache");
header("Expires: 0");
}
/* End Export code */


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../niftycube.js"></script>
<script type="text/javascript">
window.onload=function(){
Nifty("div#container");
Nifty("div#content,div#nav","same-height small");
Nifty("div#header,div#footer","small");
}
</script>

	<title><?php echo $title; ?></title>
<?php include('../config/config.php'); ?> 
<body>
<br>
<div id="container">
<div id="header">


</div>
<link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>/print.css">
<?php echo $display_block_top; ?>
<?php echo $display_block_details; ?>
<?php echo $display_block_bottom; ?>
<div id="footer"></div></div>

</body>
</html>



