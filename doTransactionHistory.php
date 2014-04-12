<?php
	include("includes/openDbConn.php");
	
	//select from all tblbankaccounttransactions
	$sql1="SELECT * FROM tblbankaccounttransactions WHERE WithdrawAccount='".$_SESSION["BankAccountId"]."' OR DepositAccount='".$_SESSION["BankAccountId"]."' ORDER BY TransactionId desc LIMIT 5";
	//$sql1="SELECT * FROM tblbankaccounttransactions WHERE WithdrawAccount='1177' OR DepositAccount='1177' ORDER BY TransactionId desc";
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
		$runningBalance = $_SESSION["BankAccountBalance"];
		$runningBalanceFormat = number_format($runningBalance,2,'.',',');

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
				if($row2['WithdrawAccount'] == $_SESSION["BankAccountId"])
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
				
				if($row2["Amount"]<0)//echo ing out credit or debit and corect coloring
				{
					
				}
				else
				{
				}

				//div
				echo "<div id=".$transactionID." class='transactionHistoryElement'>";
				echo '<div class="timestampHolder">';
				echo "<h3>".$dateFormatedMDY."</h3>";
				echo "<h5>".$dateFormatedHM."</h5>";
				echo "</div>";
				echo '<div class="infoFromHolder">';
				echo "<h3>From: ".$senderReal."</h3>";
				echo "<h5>Memo: ".$row2["Notes"]."</h5>";
				echo "</div>";
				echo '<div class="amountBalanceHolder">';
				echo "<h3>Credit: ".$row2["Amount"]."</h3>";
				echo "<h5>Balance: ".$runningBalanceFormat."</h5>";
				echo "</div>";
				echo "</div>";			
				$m++;
				if($row2['WithdrawAccount'] == $_SESSION["BankAccountId"])
				{
					$runningBalance = $runningBalance + $row2['Amount'];
					$runningBalanceFormat = number_format($runningBalance,2,'.',',');
				}
				else
				{
					$runningBalance = $runningBalance - $row2['Amount'];
					$runningBalanceFormat = number_format($runningBalance,2,'.',',');

				}
			}
		
	}
	

?>