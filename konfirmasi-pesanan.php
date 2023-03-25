<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login']!=true) {
		echo '<script>window.location="login.php"</script>';
	}

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
	if (mysqli_num_rows($produk) == 0) {
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
	
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
	<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Warung Wahyu</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="Log-out.php">Log-out</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Edit Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1"<?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
						<option value="0"<?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if (isset($_POST['submit'])) {
						// data inputan dari form
						$kategori = $_POST['kategori'];
						$nama     = $_POST['nama'];
						$harga    = $_POST['harga'];
						$deskripsi= $_POST['deskripsi'];
						$status   = $_POST['status'];
						$foto     = $_POST['foto'];
						//data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						// jika admin ganti gambar
						if ($filename != '') {
							$type1    = explode('.', $filename);
							$type2    = $type1[1];

							$newname = 'produk'.time().'.'.$type2;

							// menampung data format file yang diizinkan 
							$tipe_diizinkan = array('jpg','jpeg','png','gif');
							// validasi format file
							if (!in_array($type2, $tipe_diizinkan)) {
								// jika format file tidak sesaui
								echo '<script>alert("Format file tidak diizinkan")</script>';
							} else {
								unlink('./produk/'.$foto);
								move_uploaded_file($tmp_name, './produk/'.$newname);
								$namagambar = $newname;
							}
						} else {
							// jika admin tidak ganti gambar
							$namagambar = $foto;
						}

						// query update data produk
						$update = mysqli_query($conn, "UPDATE tb_product SET

							category_id = '".$kategori."',
							product_name = '".$nama."',
							product_price = '".$harga."',
							product_desc = '".$deskripsi."',
							product_image = '".$namagambar."',
							product_status = '".$status."'
							WHERE product_id = '".$p->product_id."' ");

						if ($update) {
								echo '<script>alert("Data berhasil diubah!")</script>';
								echo '<script>window.location="data-produk.php"</script>';
							} else {
								echo 'gagal'.mysqli_error($conn);
							}
					}
				 ?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 Warung Wahyu.</small>
		</div>
	</footer>
	<script>
            CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>