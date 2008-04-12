<?php
// Author 
//		Ap.Muthu
// Last Edited on 
//		2008-01-04

// This file must be in the root of the application folder where the index.php resides

require_once("./config/config.php");		// for pdf variables
require_once("./include/sql_queries.php");	// for getInvoice() and getPreference()
require_once("./include/functions.php");	// for calc_invoice_paid function used in getInvoice()

// $defaults = getSystemDefaults(); // Not required as of now.

$invoice_id = $_GET['id'];
$invoice = invoice::getInvoice($invoice_id);

$preference = getPreference($invoice['preference_id']);
$pdfname = trim($preference['pref_inv_wording']) . $invoice_id;

$url_pdf = urlPDF($invoice_id);
$url_pdf_encoded = urlencode($url_pdf);

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past

$myloc  = "./library/pdf/html2ps.php";  // This file must be in the root of the application folder where the index.php resides
$myloc .= "?";
$myloc .= "&process_mode=single";
$myloc .= "&renderfields=1";
$myloc .= "&renderlinks=1";
$myloc .= "&renderimages=1";
$myloc .= "&scalepoints=1";
$myloc .= "&pixels=" 		. $pdf_screen_size;
$myloc .= "&media=" 		. $pdf_paper_size;
$myloc .= "&leftmargin=" 	. $pdf_left_margin;
$myloc .= "&rightmargin="	. $pdf_right_margin;
$myloc .= "&topmargin=" 	. $pdf_top_margin;
$myloc .= "&bottommargin=" 	. $pdf_bottom_margin;
$myloc .= "&transparency_workaround=1";
$myloc .= "&imagequality_workaround=1";
$myloc .= "&output=1";
$myloc .= "&location=pdf";
$myloc .= "&pdfname=" 		. $pdfname;
$myloc .= "&URL=" 			. $url_pdf_encoded;

header("Location: $myloc");

?>
