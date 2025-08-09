<?php
	if(isset($_POST['submit'])){
		$filename		= $_FILES['upfile']['name'];
		$temlocation	= $_FILES['upfile']['tmp_name'];
		
		$uplocation = "img/".$filename;
		
		if(move_uploaded_file($temlocation,$uplocation)){
			echo "Upload successfully";
		}else{
			echo "Not Uploading";
		}
	}

 ?>
 
<!DOCTYPE html>
<html>
	<head>
		<title>File Upload</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<body>
		 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
			Select Your File: <br>
			<input type="file" name="upfile"><br><br>
			<input type="submit" value="Upload" class="btn btn-warning" name="submit">
		</form>
	</body>
</html>