<style type="text/css">
	.cpvg-table{
		margin-top:10px;
		border: 1px solid #000000;
		border-collapse: collapse;
		
	}
	.cpvg-table td {
		border: 1px solid #000000;
		padding: 2px;
	}
	.cpvg-table td {
		border: 1px solid #000000;
		padding: 2px;
	}
	.cpvg-table th {
		border: 1px solid #000000;
		background-color: #000000;
		color: #E5E5E5;
	}
	.cpvg-table td ul {

	}
</style>

<?php	
	$processed_data = array('labels'=>array(),'values'=>array());
	$output = "";
	
	foreach($record_data as $record){
		if(isset($record['label'])){
			$processed_data['labels'][] = "<th>".$record['label']."</th>";
			$processed_data['values'][] = "<td>".$record['value']."</td>";
		}else{  
			//if there is no label then it is a heading or horizontal line or a similar element
			//this finishes the table and prints the element
			if(!empty($processed_data['labels'])){
				$output.="<table class='cpvg-table'>\n";
				$output.="<tr>".implode("",$processed_data['labels'])."</tr>\n";
				$output.="<tr>".implode("",$processed_data['values'])."</tr>\n";
				$output.="</table>\n";
			}
			$output.=$record['value'];
			$processed_data['labels'] = array();
			$processed_data['values'] = array();
		}
	}

	if(!empty($processed_data['labels'])){
		$output.="<table class='cpvg-table'>\n";
		$output.="<tr>".implode("",$processed_data['labels'])."</tr>\n";
		$output.="<tr>".implode("",$processed_data['values'])."</tr>\n";
		$output.="</table>\n";			
	}		
	echo $output;
?>
