<?php
	include_once("connection.php");
	
	$sql3 = "SELECT * FROM product";
	$query3 = $conn->query($sql3);
	
	$data_list = array();

	while($data3 = mysqli_fetch_assoc($query3)){
		$product_id 	= $data3['product_id'];
		$product_name 	= $data3['product_name'];

		$data_list[$product_id] = $product_name;
		}
	
	session_start();
	 $user_first_name = $_SESSION['user_first_name'];
	 $user_last_name = $_SESSION['user_last_name'];
 
	if(!empty($user_first_name) && !empty($user_last_name)){
?>


<!DOCTYPE html>

<html>
	<head>
		<title>Report</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<body>
	
		<div class="container bg-light"><!--Main container-->
				<div class="container-foulid border-bottom border-warning"><!--Start Top Ber-->
					<?php include_once('topber.php')?>
				</div><!--End Top Ber-->
				<div class="container-foulid">
					<div class="row"><!--Start Row-->
						<div class="col-sm-3 bg-light p-0 m-0"><!--Start Left-->
							<?php include_once("left.php")?>
						</div><!--End Left-->
						<div class="col-sm-9 border-start border-warning"><!--Start Right-->
							<div class="container p-4 m-4">
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
									Select Product Name:
									<select name="product_name" class="form-control">
										<?php 
										
											$sql = "SELECT * FROM product" ;
											$query = $conn->query($sql);
											
											while($data = mysqli_fetch_array($query)){
												$product_id   		= $data['product_id'];
												$product_name   	= $data['product_name'];
												
										?>
										<option value="<?php echo $product_id  ?>">
											<?php echo $product_name ?>
										</option>
											<?php } ?>
									</select><br>
									<input type="submit" value="Generate Report" class="btn btn-warning">
								</form>
		
								<h2 class="mt-4">Store Product</h2>
								<?php
								// Report Entry Data
									if(isset($_GET['product_name'])){
										$product_name =$_GET['product_name'];
										
										$sql2 = "SELECT * FROM store_product WHERE store_product_name = $product_name";
										$query2 = $conn->query($sql2);
										
										while($data2 = mysqli_fetch_array($query2)){
										$store_product_quantity 	= $data2['store_product_quantity'];
										$store_product_entry_date 	= $data2['store_product_entry_date'];
										$store_product_name 		= $data2['store_product_name'];
										
										echo "<h3 class='text-center bg-warning'>$data_list[$store_product_name]</h3>";
										echo "<table class='table table-success table-striped table-hover'><tr><td>Entry Date</td><td>Quantity</td></tr>";
										echo "<tr><td>$store_product_entry_date</td><td>$store_product_quantity</td></tr>";
										echo "</table>";
										}
									}
								?>
		
								<h2 class="mt-4">Spand Product</h2>
								<?php
								// Report Spand Data
									if(isset($_GET['product_name'])){
										$product_name =$_GET['product_name'];
										
										$sql4 = "SELECT * FROM spend_product WHERE spend_product_name = $product_name";
										$query4 = $conn->query($sql4);
										
										while($data4 = mysqli_fetch_array($query4)){
										$spend_product_quentity 	= $data4['spend_product_quentity'];
										$spend_product_entry_date 	= $data4['spend_product_entry_date'];
										$spend_product_name 		= $data4['spend_product_name'];
										
										echo "<h3 class='text-center bg-warning'>$data_list[$spend_product_name]</h3>";
										echo "<table class='table table-success table-striped table-hover'><tr><td>Spand Date</td><td>Quantity</td></tr>";
										echo "<tr><td>$spend_product_entry_date</td><td>$spend_product_quentity</td></tr>";
										echo "</table>";
										}
									}
								?>	
								
								<h2 class="mt-4">Current Quantity</h2>
								<?php
									if (isset($_GET['product_name'])) {
										$product_id = $_GET['product_name'];

										// Store Product Quantity
										$sql2 = "SELECT SUM(store_product_quantity) AS total_store 
												 FROM store_product 
												 WHERE store_product_name = $product_id";
										$query2 = $conn->query($sql2);
										$store_data = mysqli_fetch_assoc($query2);
										$total_store = $store_data['total_store'] ?? 0;

										// Spend Product Quantity
										$sql4 = "SELECT SUM(spend_product_quentity) AS total_spend 
												 FROM spend_product 
												 WHERE spend_product_name = $product_id";
										$query4 = $conn->query($sql4);
										$spend_data = mysqli_fetch_assoc($query4);
										$total_spend = $spend_data['total_spend'] ?? 0;

										// Current Quantity Calculation
										$current_quantity = $total_store - $total_spend;

										// Product Name দেখানো
										$sql_p = "SELECT product_name FROM product WHERE product_id = $product_id";
										$query_p = $conn->query($sql_p);
										$product_row = mysqli_fetch_assoc($query_p);
										$product_name_text = $product_row['product_name'] ?? 'Unknown';

										// Output Table
										echo "<div class='p-3 mb-4 bg-warning text-black rounded shadow-sm'>";
										echo "<h3 class='text-center'>Product: $product_name_text</h3>";
										echo "<table class='table table-bordered table-hover bg-white text-dark mt-2'>";
										echo "<tr><th>Total Store</th><th>Total Spend</th><th>Current Quantity</th></tr>";
										echo "<tr>
												<td>$total_store</td>
												<td>$total_spend</td>
												<td class='fw-bold'>$current_quantity</td>
											  </tr>";
										echo "</table>";
										echo "</div>";
									}
								?>
							</div>
						</div>
					</div><!--End of Row-->
				</div>
				<div class="container-foulid border-top border-warning">
					<?php include_once("footer.php")?>
				</div>
		</div>
			<!--End Content-->
	</body>
</html>

<?php
	}else{
		header('location:login.php');
	}
?>