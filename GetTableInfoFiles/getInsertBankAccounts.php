<?php
	include("includes/openDbConn.php");
	$sql = "SELECT * FROM tblBankAccounts";
	$result = mysql_query($sql);
	$numMatches = mysql_num_rows($result);
	for($counter=0; $counter < $numMatches; $counter++)
	{
		$row = mysql_fetch_array($result);
		$sqlInsert = "INSERT INTO tblBankAccounts(AccountID, CurrentBalance, Type, TimeStamp) VALUES('".trim($row["AccountID"])."','".trim($row["CurrentBalance"])."','".trim($row["Type"])."','".trim($row["TimeStamp"])."');<br/>";
		echo($sqlInsert);
	}
	include("includes/closeDbConn.php");
?>