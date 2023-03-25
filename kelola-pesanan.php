<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login']!=true || $_SESSION['a_global']->level != 'admin') {
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
			<h3>Data Produk</h3>
			<div class="box">
				<p><a href="konfirmasi-pesanan.php">Tambah Produk</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th>Id Pemesan</th>
							<th>Nama</th>
							<th>Id Pesanan</th>
							<th>Nama Pesanan</th>
							<th>Harga Pesanan</th>
							<th>No.Telp</th>
							<th>Status Pengiriman</th>
							<th>Status Pembayaran</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php 
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_SESSION['id']."' ");
							$detail = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE pemesan_id = '".$_SESSION['a_global']->admin_id."' ORDER BY pesanan_id DESC");
							$d = mysqli_fetch_array($detail);
							if (mysqli_num_rows($produk) > 0 || mysqli_num_rows($detail) > 0) {
							while ($row = mysqli_fetch_array($produk)) {
								
						 ?>

						<tr>
							<td style="text-align: center"><?php echo $row['product_name'] ?> <?php $namaproduk = $row['product_name'] ?></td>
							<td style="text-align: center">Rp<?php echo number_format($row['product_price']) ?></td>
							<td style="text-align: center"><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="produk/<?php echo $row['product_image'] ?>" width="300px"></a></td>
							<td style="text-align: center"><?php echo ($d['status_pembayaran'] == 0)? 'Sedang diperiksa':'Terverifikasi'; ?></td>
							<td style="text-align: center"><?php echo ($d['status_pengiriman'] == 0)? 'Belum dikirim':'Telah dikirim'; ?></td>
							<td>
								<a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
							</td>
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="6">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 Warung Wahyu.</small>
		</div>
	</footer>
</body>
</html>