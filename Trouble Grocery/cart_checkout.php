<!-- INCLUDE HEADER -->
<?php
require('templates/header.php');
?>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 px-4 pb-4" id="order">
				<h4 class="text-center text-info p-2">Thank You!</h4>

				<div class="jumbotron p-3 mb-2 text-center">
					<!-- PRODUCT TOTAL -->
					<h6 class="lead"><b>Sub Total : </b><?= $_SESSION['grandTotal']; ?></h6>

					<!--  SHIPPING FEE -->
					<h6 class="lead"><b>Shipment : RM 5.00 </b></h6>

					<!-- GRAND TOTAL -->
					<h5><b>Grand Total : RM</b><?= $_SESSION['grandTotal'] + 5 ?></h5>

					<!-- ADRRESS -->
					<h5><b>Address</b></h5>
					<h5>
					<?php $user_list = getData('users');
						foreach ($user_list as $user){
							if ($user['id'] == $_SESSION['id']){
								echo $user['address'];
							}
						}		
					?>
					</h5>
				</div>
				<!-- Back Button -->
				<div class="container-fluid padding">
					<div class="row text-center">
						<div class="col-6">
							<br>
							<a class="nav-link btn btn-secondary text-white" href="product_index.php">Back</a>
						</div>
						<div class="col-6">
							<br>
							<a class="nav-link btn btn-primary text-white" href="product_index.php">View Orders</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php

	// INSERT ORDER DETAILS
	
	$ID = $_SESSION['id'];
	$total = $_SESSION['grandTotal'];

	$sql = "INSERT INTO orders VALUES (NULL, '$ID','$total','0' ,CURRENT_TIMESTAMP)";

	global $con;

	if ($con->query($sql) === TRUE) {
		echo "Congratulations, product Record Updated : D";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	};
?>
