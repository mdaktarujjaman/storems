<?php
 session_start();
 $user_first_name = $_SESSION['user_first_name'];
 $user_last_name = $_SESSION['user_last_name'];
 
 if(!empty($user_first_name) && !empty($user_last_name)){
	
?>

<!DOCTYPE html>
<html>
	<header>
		<title>Store Manegement System | By GrapTech</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</header>
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
						<div class="row p-4"><!--Inside Element 01-->
							<div class="col-sm-3">
								<a href="add_category.php"><i class="fa-solid fa-folder fa-5x text-success"></i></a>
								<p>Add Category</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_category.php"><i class="fa-solid fa-folder-open fa-5x text-success"></i></a>
								<p>Category List</p>
							</div>
							<div class="col-sm-3">
								<a href="add_product.php"><i class="fa-solid fa-table-list  fa-5x text-success"></i></a>
								<p>Add Product</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_product.php"><i class="fa-solid fa-list-check fa-5x text-success"></i></a>
								<p>Product List</p>
							</div>
						</div>
						
						<hr class="border border-warning">
						
						<div class="row p-4"><!--Inside Element 02-->
							<div class="col-sm-3">
								<a href="add_store_product.php"><i class="fa-solid fa-store fa-5x text-success"></i></a>
								<p>Add Store Product</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_store_product.php"><i class="fa-solid fa-clipboard-list fa-5x text-success"></i></a>
								<p>Store Product List</p>
							</div>
							<div class="col-sm-3">
								<a href="add_spend_product.php"><i class="fa-brands fa-sellsy fa-5x text-success"></i></a>
								<p>Spend Product</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_spend_product.php"><i class="fa-solid fa-list-ol fa-5x text-success"></i></a>
								<p>Spend Product List</p>
							</div>
						</div>
						
						<hr class="border border-warning">
						
						<div class="row p-4"><!--Inside Element 03-->
							<div class="col-sm-3">
								<a href="report.php"><i class="fa-solid fa-chart-simple fa-5x text-success"></i></i></a>
								<p>Report</p>
							</div>
							<div class="col-sm-3">
								<a href="add_users.php"><i class="fa-solid fa-user-plus fa-5x text-success"></i></i></a>
								<p>Add User</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_users.php"><i class="fa-solid fa-elevator fa-5x text-success"></i></i></a>
								<p>User List</p>
							</div>
							<div class="col-sm-3">
								
							</div>
						</div>
					</div><!--End Right-->
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