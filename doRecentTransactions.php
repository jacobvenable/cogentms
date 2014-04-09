<?php
	$sql1 = "SELECT * FROM tblbankaccounttransactions WHERE WithdrawAccount='".$_SESSION["BankAccountId"]."' OR DepositAccount='".$_SESSION["BankAccountId"]."' ORDER BY TransactionId desc LIMIT 5";
	$result = mysql_query($sql1);
	if(!$result)
	{
		echo ("Failed to Retrieve Information");
	}
	else
	{
		$numRows = mysql_num_rows($result);
		$runningBalance = $_SESSION["BankAccountBalance"];
		if($numRows > 0)
		{
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>Date</th>";
			echo "<th>Executor</th>";
			echo "<th>Notes</th>";
			echo "<th>Amount</th>";
			echo "<th>Total</th>";
			echo "</tr>";
			for($i=0;$i<$numRows;$i++)
			{
				$row2= mysql_fetch_array($result);
				$date = new DateTime($row2['TimeStamp']);
				$dateFormatted = $date->format('m/d/Y');
				echo "<tr>";
				echo "<td>".$row2['TransactionId']."</td>";
				echo "<td>".$dateFormatted."</td>";
				echo "<td>".$row2['Executor']."</td>";
				echo "<td>".$row2['Notes']."</td>";
				if($row2['WithdrawAccount'] == $_SESSION["BankAccountId"])
				{
					echo "<td>-".$row2['Amount']."</td>";
				}
				else
				{
					echo "<td>+".$row2['Amount']."</td>";
				}
				echo "<td>".$runningBalance."</td>";							
				echo "</tr>";
				if($row2['WithdrawAccount'] == $_SESSION["BankAccountId"])
				{
					$runningBalance = $runningBalance + $row2['Amount'];
				}
				else
				{
					$runningBalance = $runningBalance - $row2['Amount'];
				}
			}
		}
		else
		{
			echo "<p>No Recent Transactions</p>";
		}
	}
?>