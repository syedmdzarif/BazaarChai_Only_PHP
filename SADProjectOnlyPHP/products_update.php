<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="products_update.css">
	
	 
	<title>BazaarChai</title>
</head>
<body>
<?php


error_reporting(E_ALL ^ E_WARNING); 

	$conn = mysqli_connect('localhost', 'syed', 'pass123', 'bazaarchai_only_php');

	$id_variable = mysqli_real_escape_string($conn, $_GET['id']);
	//$app_id = mysqli_real_escape_string($conn, $_GET['app_id']);
	$query = "SELECT * FROM products WHERE id = '$id_variable' ";
	$query_run = mysqli_query($conn, $query);

	if($query_run)
	{
		while($products = mysqli_fetch_array($query_run))
		{

			?>
			<div class = "container">
				<div class="jumbotron">
					<h2>Update Product Information</h2>
					<hr>

					<form action="" method="post">
						<input type="hidden" name="id" value="<?php echo $products['id']   ?>">

					<div class = "form-group">
						<label for=""> Category </label>
						<input type = "text" name = "category" class = "form-control" value="<?php echo $products['category']   ?>" placeholder="Enter Category" required>
					</div>

					<div class = "form-group">
						<label for=""> Name </label>
						<input type = "text" name = "name" class = "form-control" value="<?php echo $products['name']   ?>"placeholder="Enter Name" required>
					</div>

					<div class = "form-group">
						<label for=""> Price </label>
						<input type = "number" name = "price" class = "form-control" value="<?php echo $products['price']   ?>" placeholder="Enter Price" required>
					</div>

					<div class = "form-group">
						<label for=""> Unit </label>
						<input type = "text" name = "unit" class = "form-control" value="<?php echo $products['unit']   ?>" placeholder="Enter Unit" required>
					</div>

					<button type= "submit" name="update" class="search-btn"> Update Info </button>

					<a href = "products.php" class = "search-btn"> Back </a>

				</form>

				 <?php 

				if(isset($_POST['update']))
				{
					$category = mysqli_real_escape_string($conn, $_POST['category']);
					$name = mysqli_real_escape_string($conn, $_POST['name']);
					$price = mysqli_real_escape_string($conn, $_POST['price']);
					$unit = mysqli_real_escape_string($conn, $_POST['unit']);

					$query = "UPDATE products SET category = '$category', name = '$name', price = '$price', unit = '$unit' WHERE id = '$id_variable' ";
					$query_run = mysqli_query($conn, $query);

					if($query_run)
					{
						echo '<script> alert("Information Updated"); </script>';
						//header ("location: products_update.php");
					}
					else
					{
						echo '<script> alert("Information Not  Updated"); </script>';
					}
				}

				?> 





				</div>

			</div>

			<?php





		}
	}
	else
	{
		echo '<script> alert("No record found"); </script>';
	}

?>
</body>
</html>