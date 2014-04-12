<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/transactionHistory.css" />
	<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
		<script type="text/javascript" src="js/easing.js" ></script>
	<script type="text/javascript">

	var counter = 0;

	$(document).ready(function(){


		animateDivFlyIn();
		
		function animateDivFlyIn(i){
			
			
			$('.transactionHistoryElement:eq(' + counter + ')').animate({
				left: 0,
				opacity: 1
				},300,'easeInOutCirc');

			
			if(counter < $('.transactionHistoryElement').length){
				setTimeout(function(){
					counter++;
					animateDivFlyIn();
				},50);
			}

		}
	});
	</script>
</head>
<body>
<?php include("nav.php"); ?>
	<div id="transactionHistoryMain" class="maincontainer" >
		<h1>Transaction History</h1>
		<div id="transactionTile" class="infoTile">
			<?php include("doTransactionHistory.php")?>;
		</div>
	</div>
</body>
</html>