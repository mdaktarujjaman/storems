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
		<title>Edit Category</title>
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
										
										
										$sql = "SELECT * FROM category WHERE category_id=$getid";
										
										$query = $conn->query($sql);
										$data = mysqli_fetch_assoc($query);
										
										$category_id		 = $data['category_id'];
										$category_name		 = $data['category_name'];
										$category_entrydate  = $data['category_entrydate'];
									}
									
									if(isset($_GET['category_name'])){
										$name = $_GET['category_name'];
										$date = $_GET['category_entrydate'];
										$id   = $_GET['category_id'];
										
										$sql = "UPDATE category SET 
												category_name='$name', 
												category_entrydate='$date'
												WHERE category_id = $id";
												
										if($conn->query($sql)== TRUE){
											echo "Update Info successfully";
										}else{
											echo "Error Information";
										}
									}
								?>
	
								<form action="edit_category.php" method="GET">
									<label class="form-label">Category:</label>
									<input type="text" class="form-control" name = "category_name" value="<?php echo $category_name ?>" >
									<label class="form-label">Category Entry Date:</label>
									<input type="date" class="form-control" name="category_entrydate" value="<?php echo $category_entrydate ?>" >
									<input type="text" name = "category_id" value="<?php echo $category_id ?>" hidden >
									
									<input type="submit" value="Update" class="btn btn-warning mt-3">
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