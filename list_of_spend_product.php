<?php
	include_once("connection.php");
	
	$sql1 = "SELECT * FROM product";
	$query1 = $conn->query($sql1);
	$data_list = array();

	while($data1 = mysqli_fetch_assoc($query1)){
		$product_id = $data1['product_id'];
		$product_name = $data1['product_name'];

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
		<title>List of Spend Product</title>
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
								<?php
									$sql = "SELECT * FROM spend_product";
									$query = $conn->query($sql);
									
									echo "<table class='table table-success table-striped table-hover'>
									<tr>
										<th>Product Name</th>
										<th>Quantity</th>
										<th>Entry Date</th>
										<th>Action</th>
										<th>Delete</th>
									</tr>";
									
									while($data = mysqli_fetch_array($query)){
										$spend_product_id   		= $data['spend_product_id'];
										$spend_product_name   		= $data['spend_product_name'];
										$spend_product_quentity 	= $data['spend_product_quentity'];
										$spend_product_entry_date 	= $data['spend_product_entry_date'];
										
										
										echo "<tr>
													<td>$data_list[$spend_product_name]</td>
													<td>$spend_product_quentity</td>
													<td>$spend_product_entry_date</td>
													<td><a href='edit_spend_product.php?id=$spend_product_id' class='btn btn-warning'>Edit</a></td>
													<td>
															<a href='#' class='btn btn-danger'>Delete</a>
													</td>
											   </tr>";
									
									}
									echo "</table>";
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