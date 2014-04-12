<?php
	session_start();
	
	include("includes/openDbConn.php");
	//SELECT ALL FROM TABLE WHERE Requesting Person = User 
	//$sql = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='".$_SESSION["PersonId"]."'";
		$sql = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId";

//	echo $sql;
	
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	if($result==false)
	{
		die(mysql_error());
		echo "ERROR";
	}
	
	echo '<table id="transactionTable">
		<tr>
			<th>Category</th>
			<th>Number of Submissions</th>
			<th>Avg Submission Amount</th>
			<th>Total</th>
		</tr>';
	
	//	C - Co-op
	$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='C'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='C' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='C' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
	
	//	E - Entrepreneurial
	
	$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='E'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='E' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='E' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
		
	//	F - Employed After Grad
	
	$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='F'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='F' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='F' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
	
	//	I - Internship
	
	$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='I'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='I' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='I' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
	
	//	L - Certification
	
		$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='L'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='L' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='L' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
	
	//	O - Other
	
			$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='O'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='O' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='O' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
	
	//	P - Employed on job
	
			$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='P'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='P' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='P' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
	
	//	R - Part of Research Team
	
			$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='R'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='R' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='R' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";
	
	//	S - Student Activities
	
			$sqlC = "SELECT * FROM tblactivities a, tblactivitytypes t WHERE RequestingPerson='2' AND t.ActivityTypeId=a.ActivityTypeId AND a.ActivityTypeId='S'";
			//echo $sqlC."</br>";
	$rowC = mysql_fetch_array(mysql_query($sqlC));
	$numC = mysql_num_rows(mysql_query($sqlC));
		//Average submission amount
		$sqlCAvg = "SELECT ActivityTypeId, AVG(Reward) as avgReward FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='S' Group By ActivityTypeId";
			//echo $sqlCAvg."</br>";
		$resultC = mysql_query($sqlCAvg);
		$rowResC = mysql_fetch_array($resultC);//Average submission amount
		//Total submission amount
		$sqlTtlC = "SELECT SUM(Reward) AS Total FROM tblactivities WHERE RequestingPerson='2' AND ActivityTypeId='S' Group By ActivityTypeId";
			//echo $sqlTtlC."</br>";
		$resultTtlC = mysql_query($sqlTtlC);
		$rowTtlC = mysql_fetch_array($resultTtlC);;//total submission quantity
	
	echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>
		</table>";

		/*echo 
		"<tr>
			<th>".$rowC["Name"]."</th>
			<th>".$numC."</th>
			<th>".$rowResC["avgReward"]."</th>
			<th>".$rowTtlC["Total"]."</th>
		</tr>";*/
/*
<table id="transactionTable">
				<tr>
				  <th>Category</th>
				  <th>Number Submissions</th>		
				  <th>Avg Submission Amount</th>
				  <th>Total</th>
				</tr>
				<tr>
				  <td>Internship</td>
				  <td>2</td>		
				  <td>2000</td>
				  <td>4000</td>
				 </tr>
				
				<tr>
				  <td>Grades</td>
				  <td>5</td>		
				  <td>1000</td>
				  <td>5000</td>
				 </tr>
				
				<tr>
				  <td>Job</td>
				  <td>1</td>		
				  <td>5000</td>
				  <td>5000</td>
				 </tr>
				
				<tr>
				  <td>Extracurricular</td>
				  <td>3</td>		
				  <td>2000</td>
				  <td>6000</td>
				 </tr>
				<tr>
				
				  <td>Job Fair</td>
				  <td>2</td>		
				  <td>100</td>
				  <td>200</td>
				 </tr>
									
			</table>*/
?>