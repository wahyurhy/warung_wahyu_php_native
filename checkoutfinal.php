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
	<link href="library/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
							$id = $_SESSION['id'];
							$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$id."' ");
							if (mysqli_num_rows($produk) > 0) {
							while ($row = mysqli_fetch_array($produk)) {
								
						 ?>

						<tr>
							<td style="text-align: center"><?php echo $row['product_name'] ?> <?php $namaproduk = $row['product_name'] ?></td>
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
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th>Total Harga</th>
						</tr>
					</thead>

					<tbody>

						<?php 	

							$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$id."' ");
							if (mysqli_num_rows($produk) > 0) {
							while ($row = mysqli_fetch_array($produk)) {
								
						 ?>

						<tr>
							<td style="text-align: center">Ongkir = Rp<?php echo number_format($_SESSION['ongkir']->jasa_harga) ?><br>Rp<?php echo number_format($row['product_price']+$_SESSION['ongkir']->jasa_harga) ?> <?php $total = $row['product_price']+$_SESSION['ongkir']->jasa_harga ?> <?php $ongkir = $_SESSION['ongkir']->jasa_harga ?></td>
						</tr>
						<?php } } else { ?>
							<tr>
								<td colspan="3">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="block">
		                <div class="navbar navbar-inner block-header">
		                    <div class="muted pull-left"></div>
		                </div>
		                <div class="block-content collapse in">
		                    <div class="span12">
		                         <form action="" method="POST" class="form-horizontal">
		                          <fieldset>
		                            <legend>Biodata Penerima</legend>
		                            <div style="margin-top: -40px" class="control-group">
		                              <!-- <label class="control-label" for="focusedInput">Nama Barang</label> -->
		                              <div class="controls">
		                                <input name="namabarang" class="input-xlarge focused" id="focusedInput" type="hidden" value="<?php echo $namaproduk ?>">
		                              </div>
		                            </div>
		                            <div class="control-group">
		                              <!-- <label class="control-label" for="focusedInput">Harga Barang</label> -->
		                              <div class="controls">
		                                <input name="harga" class="input-xlarge focused" id="focusedInput" type="hidden" value="<?php echo $total ?>">
		                              </div>
		                            </div><div class="control-group">
		                              <!-- <label class="control-label" for="focusedInput">Id</label> -->
		                              <div class="controls">
		                                <input name="id" class="input-xlarge focused" id="focusedInput" type="hidden" value="<?php echo $_SESSION['a_global']->admin_id ?>">
		                              </div>
		                            </div>	
		                            <div class="control-group">
		                            	</div><div class="control-group">
		                              <!-- <label class="control-label" for="focusedInput">ongkir</label> -->
		                              <div class="controls">
		                                <input name="ongkir" class="input-xlarge focused" id="focusedInput" type="hidden" value="<?php echo $ongkir ?>">
		                              </div>
		                              <div class="control-group">
		                            	</div><div class="control-group">
		                              <!-- <label class="control-label" for="focusedInput">produk_id</label> -->
		                              <div class="controls">
		                                <input name="product_id" class="input-xlarge focused" id="focusedInput" type="hidden" value="<?php echo $id ?>">
		                              </div>
		                            </div>	
		                            <div class="control-group">
		                              <label class="control-label" for="focusedInput">Nama Penerima</label>
		                              <div class="controls">
		                                <input name="nama" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $_SESSION['a_global']->admin_name ?>">
		                              </div>
		                            </div>
		                            <div class="control-group">
		                              <label class="control-label" for="focusedInput">No.Telp/WhatsApp</label>
		                              <div class="controls">
		                                <input name="telp" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $_SESSION['a_global']->admin_telp ?>">
		                              </div>
		                            </div>
		                            <div class="control-group">
		                              <label class="control-label" for="focusedInput">Alamat Lengkap</label>
		                              <div class="controls">
		                                <input name="alamat" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $_SESSION['a_global']->admin_address ?>">
		                              </div>
		                              <br>
		                              <div class="control-group">
                                          <label class="control-label" for="textarea2">Catatan Pembeli</label>
                                          <div class="controls">
                                            <textarea name="note" class="input-xlarge textarea" placeholder="Ketik disini.." style="width: 270px; height: 100px"></textarea>
                                          </div>
                                        </div>

                                        <legend>Metode Pembayaran</legend>
                                        <table class="table table-bordered table-striped" style="width: 40%">
                                        	<thead>
												<tr>
													<th>Via</th>
													<th>Nomor Rekening</th>
												</tr>
											</thead>
											<tbody>

                                        <?php 
											

                                        	$select = mysqli_query($conn, "SELECT * FROM tb_pembayaran");
											if (mysqli_num_rows($select) > 0) {
											while ($row = mysqli_fetch_array($select)) {
												
										 ?>
                                        		
												<tr>
													<td style="text-align: center;">
													  <img src="<?php echo $row['via_image'] ?>" width="50px"  >
													</td>
													<td style="text-align: center;">
													  <?php echo $row['via_no'] ?>
													  
													</td>
											  </tr>
                                        	<?php } } else { ?>
												<tr>
													<td colspan="2">Tidak ada data</td>
												</tr>
											<?php } ?>
                                         </tbody>
                                         <tfoot>
                                         	<tr>
                                         		<td colspan="2" style="text-align: right;">Atas Nama<br>Wahyu Rahayu</td>
                                         	</tr>
                                         </tfoot>
										</table>
		                            
		                            
		                            <div class="form-actions">
		                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		                              <button type="reset" class="btn">Cancel</button>
		                            </div>
		                          </fieldset>
		                        </form>

		                    </div>
		                </div>
		            </div>
				<?php 
					if (isset($_POST['submit'])) {
						$pemesan_id = $_POST['id'];
						$pesanan_nama = $_POST['namabarang'];
						$pesanan_harga = $_POST['harga'];
						$nama_pemesan = $_POST['nama'];
						$telp_pemesan = $_POST['telp'];
						$alamat_pemesan = $_POST['alamat'];
						$catatan_pemesan = $_POST['note'];
						$status_pengiriman = '0';
						$status_pembayaran = '0';
						$ongkir = $_POST['ongkir'];
						$product_id = $_POST['product_id'];

						$insert = mysqli_query($conn, "INSERT INTO tb_pemesanan VALUES (

								null,
								'".$pemesan_id."',
								'".$pesanan_nama."',
								'".$pesanan_harga."',
								'".$nama_pemesan."',
								'".$telp_pemesan."',
								'".$alamat_pemesan."',
								'".$catatan_pemesan."',
								'".$status_pengiriman."',
								'".$status_pembayaran."',
								'".$ongkir."',
								'".$product_id."')");
						if ($insert) {
								echo '<script>alert("Anda Berhasil Memesan\nSilahkan kirim bukti Pembayaran")</script>';
								echo '<script>window.location="pesanan-saya.php"</script>';
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
</body>
</html>