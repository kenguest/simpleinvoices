{*
/*
* Script: manage.tpl
* 	 Customer manage template
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

{if $customers == null}
	<P><em>{$LANG.no_customers}.</em></p>
{else}


<h3>Manage Students :: <a href="index.php?module=customers&view=add">Add New Student</a></h3>
<hr />
{if $smarty.get.action == "search"}

Students filtered by 
	{if $smarty.get.id != ""}Student ID = {$smarty.get.id}{/if}
	{if $smarty.get.student_id != ""}Student Name =  {$customers.0.first_name} {$customers.0.middle_name} {$customers.0.name}{/if}
	{if $smarty.get.course_id != ""}Course =  {$courses_search.0.description}{/if}
	{if $smarty.get.first_name != ""}First Name like '{$smarty.get.first_name}'{/if}
	{if $smarty.get.middle_name != ""}Middle Name like '{$smarty.get.middle_name}'{/if}
	{if $smarty.get.name != ""}Last Name like '{$smarty.get.name}'{/if}
 <a href="index.php?module=customers&view=manage">Clear filer</a> :: <a href="index.php?module=customers&view=search">Search again</a>
<br>
<hr />
{/if}

<table align="center" id="rico_customer" class="ricoLiveGrid manage">
<colgroup>
<col style='width:10%;' />
<col style='width:5%;' />
<col style='width:25%;' />
<col style='width:15%;' />
<col style='width:15%;' />
<col style='width:15%;' />
</colgroup>
<thead>
<tr class="sortHeader">
<th class="noFilter sortable">{$LANG.actions}</th>
<th class="index_table sortable">{$LANG.customer_id}</th>
<th class="index_table sortable">{$LANG.customer_name}</th>
<!--
<th class="index_table">{$LANG.phone}</th>
-->
<th class="index_table sortable">{$LANG.total}</th>
<!--
<th class="index_table">{$LANG.paid}</th>
-->
<th class="index_table sortable">{$LANG.owing}</th>
<th class="index_table sortable">{$LANG.enabled}</th>
</tr>
</thead>



{foreach from=$customers item=customer}

	<tr class="index_table">
	<td class="index_table"><a class="index_table"
	 href="index.php?module=customers&view=details&id={$customer.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=customers&view=details&id={$customer.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$customer.id}</td>
	<td class="index_table">{$customer.name}, {$customer.first_name} {$customer.middle_name}</td>
	<!--
	<td class="index_table">{$customer.phone}</td>
	-->
	<td class="index_table">{$customer.total}</td>
	<!--
	<td class="index_table">{$invoice.paid}</td>
	-->
	<td class="index_table">{$customer.owing}</td>
	<td class="index_table">{$customer.enabled}</td>
	</tr>

{/foreach}
	</table>
{/if}
