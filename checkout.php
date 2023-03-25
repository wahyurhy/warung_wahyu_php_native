<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login']!=true) {
		echo '<script>window.location="login.php"</script>';
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="witdh=device-width, initial-scale=1">
	<title>Warung Wahyu</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<!-- <link href="library/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script> -->
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Warung Wahyu</a></h1>
			<ul>
				<li style="margin-top: 10px"><a href="produk-dahlogin.php">Produk</a></li>
				<li><a href="profile-user.php">Profile</a></li>
				<span class="btn-login"><a href="log-out.php">Log-out</a></span>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Checkout</h3>
			<div class="box">
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Gambar</th>
						</tr>
					</thead>
					<tbody>

						<?php 
							$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
							$_SESSION['id'] = $_GET['id'];
							if (mysqli_num_rows($produk) > 0) {
							while ($row = mysqli_fetch_array($produk)) {
								
						 ?>

						<tr>
							<td style="text-align: center"><?php echo $row['product_name'] ?></td>
							<td style="text-align: center">Rp<?php echo number_format($row['product_price']) ?></td>
							<td style="text-align: center"><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="produk/<?php echo $row['product_image'] ?>" width="300px"></a></td>
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="3">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				
				<form action="" method="POST" style="margin-top: 25px">
					<div style="margin-left: 50px" class="control-group">
                      <label class="control-label" for="select01">Pilih Jasa Pengiriman</label>
                      <div class="controls">
                        <select name="ongkir" class="chzn-select">
                          <option value="1">JNE (4 Hari Kerja) Rp10,000</option>
                          <option value="2">J&T (3 Hari Kerja) Rp11,000</option>
                          <option value="3">SiCepat (2 Hari Kerja) Rp13,000</option>
                          <option value="4">NinjaExpress (1 Hari Kerja) Rp15,000</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary"><a href="checkoutfinal.php"></a>Submit</button>
                      </div>
                    </div>
				</form>
					

						<?php 

						if (isset($_POST['submit'])) {
							$ongkir = $_POST['ongkir'];

							$biayaongkir = mysqli_query($conn, "SELECT jasa_harga FROM tb_pengiriman WHERE jasa_id = '".$ongkir."' ");
							$o = mysqli_fetch_object($biayaongkir);
							$_SESSION['ongkir'] = $o;
							echo '<script>window.location="checkoutfinal.php"</script>';
						}
								
						 ?>

						
	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 Warung Wahyu.</small>
		</div>
	</footer>
</body>
</html>