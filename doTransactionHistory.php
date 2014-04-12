<?php
	include("includes/openDbConn.php");
	
	//select from all tblbankaccounttransactions
	//$sql1="SELECT * FROM tblbankaccounttransactions WHERE WithdrawAccount='".$_SESSION["BankAccountId"]."' OR DepositAccount='".$_SESSION["BankAccountId"]."' ORDER BY TransactionId desc LIMIT 5";
	$sql1="SELECT * FROM tblbankaccounttransactions WHERE WithdrawAccount='1177' OR DepositAccount='1177' ORDER BY TransactionId desc";
	$result = mysql_query($sql1);
	//echo($sql1);
	if(!$result)
	{
		echo("Failed to Retrieve Information");
	}
	else
	{
		$numRows = mysql_num_rows($result);
		//$runningBalance = $_SESSION["BankAccountBalance"];
		$runningBalance = 500000;
		//Transaction tile	infoTile
			echo "<div id='transactionTile' class='infoTile'>";
			$m=1;
			for($i=0;$i<$numRows;$i++)
			{
				
				$transactionID = "transaction".$m;
				$row2=mysql_fetch_array($result);
				$date= new DateTime($row2['TimeStamp']);
				$dateFormatedMDY =$date->format('M d, Y');
				$dateFormatedHM = $date->format('h:m a');
				if($row2['WithdrawAccount'] == '1177')
				{
					$sender= $row2['DepositAccount'];
				}
				else
				{
					$sender= $row2['WithdrawAccount'];					
				}
				
				$sql2="SELECT * FROM tblpeople WHERE PersonId='".$sender."'";//
				$result2=mysql_query($sql2);
				$row3=mysql_fetch_array($result2);
			
					$senderReal = $row3["FirstName"]." ".$row3["LastName"];
				
				

				//div
				echo "<div id=".$transactionID." class='transactionHistoryElement'>";
				echo '<div class="timestampHolder">';
				echo "<h3>".$dateFormatedMDY."</h3>";
				echo "<h5>".$dateFormatedHM."</h5>";
				echo "</div>";
				echo '<div class="infoFromHolder">';
				echo "<h3>From: ".$senderReal."</h3>";
				echo "<h5>Memo: Project Help Payment</h5>";
				echo "</div>";
				echo '<div class="amountBalanceHolder">';
				echo "<h3>Credit: ".$row2["Amount"]."</h3>";
				echo "<h5>Balance: ".$runningBalance."</h5>";
				echo "</div>";
				echo "</div>";			
				$m++;
				if($row2['WithdrawAccount'] == '1177')
				{
					$runningBalance = $runningBalance + $row2['Amount'];
				}
				else
				{
					$runningBalance = $runningBalance - $row2['Amount'];
				}
			}
		
	}
	

?>