<?php
//SESSION START
session_start();

$_SESSION["login"] = "tburton";
$_SESSION["accountId"]="1";

$_SESSION["BankAccountId"] = "";

//CONNECT TO DB
include("includes/openDBConn.php");

//CALCULATING RUNNING BALANCE



//SELECT All TRANSACTIONS 
$sql = "SELECT PersonId, WithdrawAccount, DepositAccount, TransactionID, trans.TimeStamp, Amount, Executor, Notes FROM tblbankaccounttransactions trans, tblpeople WHERE Username='".$_SESSION["login"]."' AND (PersonId=WithdrawAccount OR PersonId=DepositAccount) ORDER BY TransactionId desc";
$result = mysql_query($sql);


//ECHO BALANCE
echo $sql." <br/>";

//CLOSE DBCONN

if($result==FALSE){
	die(mysql_error());
	echo "This shit dont work";
}


	
	//get running balance
	
	$sqlBalanceCheck="SELECT CurrentBalance FROM tblBankAccounts WHERE AccountId = ". $_SESSION["accountId"] .";";
	echo($sqlBalanceCheck);
		$balanceResult = mysql_query($sqlBalanceCheck);
		
		$rowBalance=mysql_fetch_array($balanceResult);
		$runningBalance = $rowBalance['CurrentBalance'];


	
	while($row = mysql_fetch_array($result))
	{
		//GET EXECUTOR NAME
		$sql2 = "SELECT ppl.PersonId, ppl.FirstName, ppl.LastName, trans.Executor FROM tblbankaccounttransactions trans, tblpeople ppl WHERE trans.Executor='".$row['Executor']."' AND trans.Executor=ppl.PersonId";
		
		$resultName = mysql_query($sql2);
		
		$rowName=mysql_fetch_array($resultName);
		
		$Executor = $rowName['FirstName']." ".$rowName['LastName'];

		//GET RUNNING BALANCE
		//timestamp
		$sqlTimeStamp		= "SELECT trans.TimeStamp FROM tblbankaccounttransactions trans where trans.TransactionId='".$row['TransactionID']."'";
		$resultTimeStamp	= mysql_query($sqlTimeStamp);
		$rowTimeStamp		= mysql_fetch_array($resultTimeStamp);
		$timeStamp			=$rowTimeStamp['TimeStamp'];

		
		//ECHO OUT
		echo "<tr>";
			echo "<td>".$row['TransactionID']."</td>";
			echo "<td>".$row['TimeStamp']."</td>";
			echo "<td>".$Executor."</td>"	;
			echo "<td>".$row['Notes']."</td>";	
			echo "<td>".$row['Amount']."</td>";
			echo "<td>".$runningBalance."</td>";							
		echo "</tr>";
		
		if($row['WithdrawAccount'] == $_SESSION["accountId"])
		{
			$runningBalance = $runningBalance - $row['Amount'];
		}
		else
		{
			$runningBalance = $runningBalance + $row['Amount'];
		}
	}
echo "</table>";

//function display all

include("includes/closeDBConn.php");

?>
