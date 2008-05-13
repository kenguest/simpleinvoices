<?php

/*
* Script: report_sales_by_period.php
* 	Sales reports by period add page
*
* Authors:
*	 Justin Kelly
*
* Last edited:
* 	 2008-05-13
*
* License:
*	 GPL v3
*
* Website:
* 	http://www.simpleinvoices.org
*/

checkLogin();


/*
* Get earliest invoice date
*/
$sql="select min(date) as date from ".TB_PREFIX."invoices";
$invoice_start = mysqlQuery($sql);
$invoice_start_array= mysql_fetch_array($invoice_start);
$first_invoice_year = date('Y', strtotime( $invoice_start_array['date'] ) );
/*
* Get total for each month of each year from first invoice
*/
$this_year= date('Y');
$year = $first_invoice_year ;
$years[]=$first_invoice_year ;
/*
* loop for each year
*/
while ( $year <= $this_year )
{
	/*
	* loop for each month
	*/
	$month = 01;
	while ($month <= 12)
	{
		//make month nice for mysql - accounts table doesnt like it if not 08 etc..
		if ( $month < 10 )
		{ 
			$month="0".$month;
		};
		/*
		* Sales
		*/
		$total_month_sales_sql = "select sum(ii.total) as month_total from ".TB_PREFIX."invoice_items ii, si_invoices i where i.id = ii.invoice_id AND i.date like '$year-$month%'";
		$total_month_sales = mysqlQuery($total_month_sales_sql);
		$total_month_sales_array= mysql_fetch_array($total_month_sales);
		$total_sales[$year][$month] = $total_month_sales_array['month_total'];
		if ($total_sales[$year][$month] == "" ) 
		{
			$total_sales[$year][$month] = "-";
		}

		/*
		* Payment
		*/
		$total_month_payments_sql = " select sum(ac_amount) as month_total_payments from ".TB_PREFIX."account_payments where ac_date like '$year-$month%'";
		$total_month_payments = mysqlQuery($total_month_payments_sql);
		$total_month_payments_array= mysql_fetch_array($total_month_payments);
		$total_payments[$year][$month] = $total_month_payments_array['month_total_payments'];
		if ($total_payments[$year][$month] == "" ) 
		{
			$total_payments[$year][$month] = "-";
		}
		$month++;
	}
	/*
	* Sales
	*/
	$total_year_sales_sql = "select sum(ii.total) as year_total from ".TB_PREFIX."invoice_items ii, si_invoices i where i.id = ii.invoice_id AND i.date like '$year%'";
	$total_year_sales = mysqlQuery($total_year_sales_sql);
	$total_year_sales_array= mysql_fetch_array($total_year_sales);
	$total_sales[$year]['Total'] = $total_year_sales_array['year_total'];
		if ($total_sales[$year]['Total']  == "" ) 
		{
			$total_sales[$year]['Total']  = "-";
		}

	/*
	* Payment
	*/
	$total_year_payments_sql = " select sum(ac_amount) as year_total_payments from ".TB_PREFIX."account_payments where ac_date like '$year%'";
	$total_year_payments = mysqlQuery($total_year_payments_sql);
	$total_year_payments_array= mysql_fetch_array($total_year_payments);
	$total_payments[$year]['Total'] = $total_year_payments_array['year_total_payments'];
		if ($total_payments[$year]['Total']  == "" ) 
		{
			$total_payments[$year]['Total']  = "-";
		}

	$years[]=$year ;
	$year++;
}
/*
echo "Total Sales<pre>";
print_r($total_sales);
echo "</pre><br>Total Payments<pre>";
print_r($total_payments);
echo "</pre>";
*/
$pageActive = "reports";

$smarty->assign('pageActive', $pageActive);
$smarty->assign('total_sales', $total_sales);
$smarty->assign('total_payments', $total_payments);
//$years = array(2006,2007,2008);
$years = array_reverse($years);
$smarty->assign('years', $years);


?>
