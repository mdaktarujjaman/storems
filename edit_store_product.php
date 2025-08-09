<?php
	include_once("connection.php");
	
	session_start();
	 $user_first_name = $_SESSION['user_first_name'];
	 $user_last_name = $_SESSION['user_last_name'];
 
	if(!empty($user_first_name) && !empty($user_last_name)){
?>


<!DOCTYPE html>

<html>
	<head>
		<title>Edit Store Product</title>
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
									if(isset($_GET['id'])){
										$getid = $_GET['id'];
										
										$sql = "SELECT * FROM store_product WHERE 	store_product_id =$getid";
										
										$query = $conn->query($sql);
										$data = mysqli_fetch_assoc($query);
										
										$store_product_id 	 		= $data['store_product_id'];
										$store_product_name		 	= $data['store_product_name'];
										$store_product_quantity  	= $data['store_product_quantity'];
										$store_product_entry_date  	= $data['store_product_entry_date'];
									}
									
									if(isset($_GET['store_product_name'])){
										$new_store_product_name			= $_GET['store_product_name'];
										$new_store_product_quantity 	= $_GET['store_product_quantity'];
										$new_store_product_entry_date 	= $_GET['store_product_entry_date'];
										$new_store_product_id 	   		= $_GET['store_product_id'];
										
										$sql1 = "UPDATE store_product SET store_product_name='$new_store_product_name',
												store_product_quantity='$new_store_product_quantity',
												store_product_entry_date='$new_store_product_entry_date'
												WHERE store_product_id =$new_store_product_id";
												
										if($conn->query($sql1)== TRUE){
											echo "Update Info successfully";
										}else{
											echo "Error Information";
										}
									}
								?>
	
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
									<label class="form-label">Product:</label>
									<select name="store_product_name" class="form-control">
										<?php
												
											$sql = "SELECT * FROM product";
													$query = $conn->query($sql);
							
											while($data= mysqli_fetch_array($query)){
													$data_id 	= $data['product_id'];
													$data_name  = $data['product_name'];
																
											?>
											<option value='<?php echo $data_id ?>' <?php if($store_product_name == $data_id){echo 'selected'; }?> >
												<?php echo $data_name ?>
											</option>;
											<?php	} ?>
									</select>
									<label class="form-label">Product Quentity:</label>
									<input type="number" class="form-control" name = "store_product_quantity" value="<?php echo $store_product_quantity ;?>" >
									<label class="form-label">Store Entry Date:</label>
									<input type="date" class="form-control" name="store_product_entry_date" value="<?php echo $store_product_entry_date;?>"><br>
									<input type="text" class="form-control" name="store_product_id" value="<?php echo $store_product_id ;?>" hidden>
									<input type="submit" value="submit" class="btn btn-warning">
								</form>
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