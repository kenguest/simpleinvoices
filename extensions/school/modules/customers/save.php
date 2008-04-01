<?php
/*
* Script: save.php
* 	Customers save page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;

#insert customer

$saved = false;

if ($op === "insert_customer") {

	$iCustomer = new school_student;
	if ($iCustomer->insertCustomer()) {
		$saved = true;
//		 saveCustomFieldValues($_POST['categorie'],mysql_insert_id());
	}else {
				die(mysql_error());
	}
}

if ( $op === 'edit_customer' ) {

	if (isset($_POST['save_customer'])) {
		
	$uCustomer = new school_student;
		if ($uCustomer->updateCustomer()) {
			$saved = true;
//			updateCustomFieldValues($_POST['categorie'],$_GET['id']);
		}
	}
}

$pageActive = "customers";
$smarty->assign('pageActive', $pageActive);

$smarty -> assign('saved',$saved); 
?>
