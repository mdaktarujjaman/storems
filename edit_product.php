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
		<title>Edit Product</title>
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
										
										$sql = "SELECT * FROM product WHERE product_id=$getid";
										
										$query = $conn->query($sql);
										$data = mysqli_fetch_assoc($query);
										
										$product_id		 		= $data['product_id'];
										$product_name		 	= $data['product_name'];
										$product_category  		= $data['product_category'];
										$product_code  			= $data['product_code'];
										$product_entry_date  	= $data['product_entry_date'];
									}
									
									if(isset($_GET['product_name'])){
										$new_product_name 			= $_GET['product_name'];
										$new_product_category 		= $_GET['product_category'];
										$new_product_code 			= $_GET['product_code'];
										$new_product_entry_date 	= $_GET['product_entry_date'];
										$new_product_id 			= $_GET['product_id'];
										
										$sql1 = "UPDATE product SET product_name='$new_product_name',
												product_category='$new_product_category',product_code='$new_product_code',
												product_entry_date='new_product_entry_date' WHERE product_id=$new_product_id";
												
										if($conn->query($sql1)== TRUE){
											echo "Update Info successfully";
										}else{
											echo "Error Information";
										}
									}
								?>
		
								<?php
									$sql = "SELECT * FROM category";
									$query = $conn->query($sql);
								?>
							
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
									<label class="form-label">Product:</label>
									<input type="text" class="form-control" name = "product_name" value="<?php echo $product_name ?>">
									<label class="form-label">Product Category:</label>
									<select name="product_category" class="form-control">
										<?php
											while($data= mysqli_fetch_array($query)){
											$category_id 	= $data['category_id'];
											$category_name  = $data['category_name'];
										?>	
											<option value=<?php echo $category_id ?> <?php if($category_id == $product_category){echo 'selected';}?>>
												<?php echo $category_name?>
											</option>
										<?php	} ?>
										
									</select>
									<label class="form-label">Product Code:</label>
									<input type="text" class="form-control" name = "product_code" value="<?php echo $product_code ?>">
									<label class="form-label">Product Entry Date:</label>
									<input type="date" class="form-control" name="product_entry_date" value="<?php echo $product_entry_date ?>">
									<input type="text" name="product_id" value="<?php echo $product_id ?>" hidden ><br>
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