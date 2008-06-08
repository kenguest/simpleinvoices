{if $teachers == null }
	<P><em>{$LANG.no_products}</em></p>
{else}


<h3>Manage Teachers :: <a href="index.php?module=teacher&view=add">Add New Teacher</a></h3>

 <hr />

<table align="center" class="ricoLiveGrid" id="rico_teacher">
<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:50%;' />
	<col style='width:30%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Teacher name</th>
	<th class="noFilter index_table sortable">{$LANG.enabled}</th>
</tr>
</thead>

{foreach from=$teachers item=teacher}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=teacher&view=details&id={$teacher.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=teacher&view=details&id={$teacher.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$teacher.id}</td>
	<td class="index_table">{$teacher.last_name}, {$teacher.middle_name}, {$teacher.first_name}</td>
	<td class="index_table">{$teacher.enabled}</td>
	</tr>

{/foreach}

	</table>
{/if}
