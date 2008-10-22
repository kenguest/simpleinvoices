<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();
$menu=false;
//TODO
/*validation code*/
jsBegin();
jsFormValidationBegin("frmpost");
jsValidateRequired("name","Biller name");
jsFormValidationEnd();
jsEnd();
/*end validation code*/

$payment = school_payment::getPayment($_GET['id']);

/*Code to get the Invoice preference - so can link from this screen back to the invoice - START */
$invoice = invoice::getInvoice($payment['ac_inv_id']);
$invoiceItems = getInvoiceItems($payment['ac_inv_id']);
$invoiceType = getInvoiceType($invoice['type_id']);
$paymentType = getPaymentType($payment['ac_payment_type']);

$pageActive = "payments";
$smarty->assign('pageActive', $pageActive);

$smarty -> assign("payment",$payment);
$smarty -> assign("invoice",$invoice);
$smarty -> assign("invoiceItems",$invoiceItems);
$smarty -> assign("invoiceType",$invoiceType);
$smarty -> assign("paymentType",$paymentType);

echo $invoice['total_formatted'];
$invoice_total_ru =  num2str($invoice['total']);
$smarty -> assign("invoice_total_ru",$invoice_total_ru);


?>
