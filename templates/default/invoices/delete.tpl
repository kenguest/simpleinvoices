{*
/*
* Script: quick_view.tpl
* 	 Quick view of invoice template
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}

{if $smarty.get.stage == 1 }
	Delete Invoice
	<hr></hr>

	<br>
    	    {if $invoicePaid == 0}
				Are you sure you want to delete {$preference.pref_inv_wording} {$invoice.id}
	<br>
	<br>
		<hr></hr>
		<form name="frmpost" ACTION="index.php?module=invoices&view=delete&stage=2&invoice={$smarty.get.invoice}" METHOD="post">
			<input type="submit" name="submit" value="I'm sure"> <input type=button value="Cancel" onCLick="history.back()">
			<input type="hidden" name="doDelete" value="y">
		</form>	
	        {/if}
	
	        {if $invoicePaid != 0}
				{$preference.pref_inv_wording} {$invoice.id} can not be deleted as it has payments of {$preference.pref_currency_sign}{$invoicePaid} recorded against it
				<br>
				LANG_TODO: Add help section here!!
				<br>
	<hr></hr>
			<form>
					<input type=button value="Back" onCLick="history.back()">
		</form>	
    	    {/if}


		</table>

{/if}

{if $smarty.get.stage == 2 }

	<div id="top"></b></div>
	<br><br>
	{$preference.pref_inv_wording} {$invoice_id} has been deleted
	<br><br>

{/if}
