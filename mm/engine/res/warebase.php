  <script src="./js/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
 <script type="text/javascript">
	$(function() {
		var rrr=["tr","tsa","tgo"];
		$("#tags").autocomplete({ //на какой input:text назначить результаты списка
		 source: 'http://192.168.67.62:8080/mm/auto.php'
		});
	});
</script>
<div >
<form id="wb_query" method="get"><label><input  name="query" id="tags" type="text" onClick="if(event.keyCode==13){return false;}"></label><input  value="Поиск" type="submit" onClick="resetWBTable(warebase_table); getAjax('engine/ajax_wb.php?query='+wb_query.query.value,warebase_table); return false;"></form></div>

<table id="warebase_table" class="table warebase">
  <tr> 
    <td width="50px">&nbsp;</td>
  </tr>
</table>
<div id="console" style="padding: 3px; background:#CCCCCC; float: left; vertical-align: center; font-size: 12px; text-align: left;"><img src="../../_res/process.gif" width="16" height="16"></div>
<br>
