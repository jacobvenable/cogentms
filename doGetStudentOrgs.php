<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-ui-1.10.4.min.js"></script>
<input id="autocomplete1" type="text" placeholder="Student Organization">
<script type="text/javascript">
	var data = [
<?php
	include("includes/openDBConn.php");
	$sql = "SELECT * FROM tblStudentOrgs";
	$result = mysql_query($sql);
	if($result)
	{
		$numRow = mysql_num_rows($result);
		for($i=0;$i<$numRow;$i++)
		{
			$row = mysql_fetch_array($result);
			echo('{ value: "'.$row['StudentOrgTitle'].'", label:"'.$row['StudentOrgTitle'].' ('.$row['StudentOrgAbbrev'].')" }');
			if($i!=$numRow-1)
				echo(',');
		}
	}
	else
	{
		echo("Unable to connect to database");
	}
	include("includes/closeDBConn.php");
?>
	];
	$(function(){
		$("#autocomplete1").autocomplete({
			source: data});
	});
</script>