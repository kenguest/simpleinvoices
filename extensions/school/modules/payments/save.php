<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$pageActive = "payments";
$smarty->assign('pageActive', $pageActive);

# Deal with op and add some basic sanity checking

#insert - process payment
#op=pay_selected_invoice means the user came from the print_view or manage_invoces
#op=pay_invoice means the user came from the process_paymen page

if ( isset($_POST['process_payment']) ) {

	$sql = "INSERT into
			".TB_PREFIX."account_payments
		VALUES
			(	
				NULL,
				'$_POST[ac_inv_id]',
				'$_POST[ac_amount]',
				'$_POST[ac_notes]',
				'$_POST[ac_date]',
				'$_POST[ac_payment_type]',
				'$_POST[branch_id]'
			)";

	if (mysqlQuery($sql, $conn)) {
		$display_block =  $LANG['save_payment_success'];
	} else {
		$display_block =  $LANG['save_payment_failure']."<br>".$sql;
	}

	$refresh_total = "<META HTTP-EQUIV=REFRESH CONTENT=2;URL=index.php?module=payments&view=manage>";
}

$smarty->assign('display_block', $display_block);
?>
