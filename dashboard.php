<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

}else{
     header("Location: index.php?error=Nuk funksionon kodi ne rregull");
     exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="outer-container">
		<div id="sidebar">
			<br>
		    <?php if (isset($_SESSION['username']) || isset($_SESSION['role'])) : ?>
    	    <a>Mire se erdhe </a><a style = "color: royalblue;"><?php echo $_SESSION['username']; ?> !</a><br>
			<a style = "color: red;"><?php echo $_SESSION['role'];?></a>
            <?php endif ?>

			<div class="head" > &nbsp; <span></span> </div>
			<hr style="height:0.5px;border-width:0;color:#E9E9E9;background-color:#E9E9E9">
			<div class="vl"></div>
			<div class="navbar">
			<a href="#orders">Orders</a>
			<a href="#costumers">Costumers</a>
			<a href="#reports">Reports</a> 
			<a href="#integrations">Integrations</a>
			<a href="about.html">About Us</a>
			<a href="contact.html">Contact Us</a>
			<?php
			if(isset($_SESSION['username']) || isset($_SESSION['role'])):
				if($_SESSION['role'] === "Admin"){?>
					<a href="codeProduct/editP.php">Edit Page</a>
					<a href="editUsers.php">Edit Users</a>
					<?php }
			endif ?>
			</div>
			<hr style="height:0.5px;border-width:0;color:#E9E9E9;background-color:#E9E9E9">
			<p class="save">Saved reports<p> 
			<div class="navbar">
				<a href="#current_month">Current month</a>
				<a href="#last_quarter">Last quarter</a>
				<a href="#year_end_sale">Year end sale</a>
				<a href="logout.php">Log out</a>
			</div>
			<hr style="height:0.5px;border-width:0;color:#E9E9E9;background-color:#E9E9E9">
			<p class="produktet">Produktet</p>
			<div class="box">
				<div class="slider">
					<div class="images">
						<img src="images/Produkti 01.jpg" alt="slide images" class="image" id="image">
					</div>
				</div>
				<div class="buttons">
					<button class="previous" id="previous"><</button>
				    <button class="next" id="next">></button>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="title" >
				<h2>Dashboard</h2> <span><i class="fa fa-bell-o" aria-hidden="true" style="color: white !important; padding-right: 15px"></i></span>
			</div> 
			<div class="categories">
				<div class="column"> Monitor</div>
				<div class="column"> PC</div>
				<div class="column"> Gaming</div>
				<div class="column"> Smart Phone</div>
			</div>
			<table border="1" class="table">
				<tr>
					<?php
						$query = "SELECT * FROM products";
						$query_run = mysqli_query($conn, $query);
						$count = 0;

						if(mysqli_num_rows($query_run) > 0){
							foreach($query_run as $products){
								$count++;
								if($count >= 0 && $count <= 5){
					?>
								<td>
									<img src="<?=$products['photo']?>">
									<div class="description">
										<p class="title_product"><?= $products['name']?></p>
										<p class="cmimi"><?= $products['price']?></p>
										<center>
											<form action="Products/product.php" method="POST">
											    <button type="submit" name="shiko_te_dhenat" value="<?= $products['id']?>">SHIKO DETAJET</button>
										    </form>
										</center>
									</div>	
								</td>
					<?php
							    }else if($count >= 6 && $count <= 10){
									if($count === 6){
										?>
										</tr>
										<tr>
										<?php
									}
									?>
								<td>
									<img src="<?=$products['photo']?>">
									<div class="description">
										<p class="title_product"><?= $products['name']?></p>
										<p class="cmimi"><?= $products['price']?></p>
										<center>
											<form action="Products/product.php" method="POST">
											    <button type="submit" name="shiko_te_dhenat" value="<?= $products['id']?>">SHIKO DETAJET</button>
										    </form>
										</center>
									</div>	
								</td>
									<?php
								}
								else if($count >= 11 && $count <= 15){
									if($count === 11){
										?>
										</tr>
										<tr>
										<?php
									}
									?>
								<td>
									<img src="<?=$products['photo']?>">
									<div class="description">
										<p class="title_product"><?= $products['name']?></p>
										<p class="cmimi"><?= $products['price']?></p>
										<center>
											<form action="Products/product.php" method="POST">
											    <button type="submit" name="shiko_te_dhenat" value="<?= $products['id']?>">SHIKO DETAJET</button>
										    </form>
										</center>
									</div>	
								</td>
									<?php
								}
								else if($count >= 16 && $count <= 20){
									if($count === 16){
										?>
										</tr>
										<tr>
										<?php
									}
									?>
								<td>
									<img src="<?=$products['photo']?>">
									<div class="description">
										<p class="title_product"><?= $products['name']?></p>
										<p class="cmimi"><?= $products['price']?></p>
										<center>
											<form action="Products/product.php" method="POST">
											    <button type="submit" name="shiko_te_dhenat" value="<?= $products['id']?>">SHIKO DETAJET</button>
										    </form>
										</center>
									</div>	
								</td>
									<?php
								}
							}
						}else{
							echo "<h5>No data!</h5>";
						}
					?>
				</tr>
			</table>
		</div>
	</div>
	<script src="sliderJs.js"></script>
</body>
</html>