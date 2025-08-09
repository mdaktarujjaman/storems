<?php
	include_once("connection.php");
	session_start();
?>


<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<style>
			/* Container centering */
			body {
				background-color: #f4f6f8;
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
				font-family: Arial, sans-serif;
			}

			/* Form box */
			.form-box {
				background: #fff;
				padding: 25px 40px;
				border-radius: 12px;
				box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
				text-align: center;
				width: 350px;
				
			}

			/* Headings */
			.form-box h2 {
				font-size: 20px;
				margin-bottom: 15px;
			}

			/* Labels */
			.form-label {
				display: block;
				font-size: 13px;
				margin-top: 10px;
				margin-bottom: 5px;
				text-align: left;
			}

			/* Inputs with shadow */
			.form-control {
				width: 100%;
				padding: 8px;
				border: 1px solid #ccc;
				border-radius: 5px;
				box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.05);
				outline: none;
			}

			/* Button style */
			.btn-custom {
				background-color: #4CAF50;
				color: white;
				border: none;
				padding: 8px 15px;
				border-radius: 5px;
				margin-top: 15px;
				cursor: pointer;
				font-size: 13px;
			}
			.btn-custom:hover {
				background-color: #45a049;
			}
		</style>
	</head>
	<body>
	
		<?php
			if(isset($_POST['user_email'])){
				$user_email = $_POST['user_email'];
				$user_password = $_POST['user_password'];
				
				$sql = "SELECT * FROM users WHERE user_email='$user_email' AND 
						user_password='$user_password'";
						
				$query = $conn->query($sql);
				
				if(mysqli_num_rows($query)>0){
					
					$data = mysqli_fetch_array($query);
					
					$user_first_name = $data['user_first_name'];
					$user_last_name = $data['user_last_name'];
					
					$_SESSION['user_first_name'] = $user_first_name;
					$_SESSION['user_last_name']  = $user_last_name;
					
					header('location:index.php');
					
				}else{
					echo "Not Successful";
				}
			}
			
		?>
		<div class="form-box">
			<h2>Store Management System | By GrapTech</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<label class="form-label">Enter Your Email:</label>
				<input type="email" class="form-control" name="user_email">

				<label class="form-label">Enter Your Password:</label>
				<input type="password" class="form-control" name="user_password">

				<input type="submit" value="Login" class="btn-custom">
			</form>
		</div>
	</body>
</html>