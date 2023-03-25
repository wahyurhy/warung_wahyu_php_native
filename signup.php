<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="witdh=device-width, initial-scale=1">
	<title>Login | Warung Wahyu</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>Sign-up</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass1" placeholder="Password" class="input-control">
			<input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-control">
			<input type="submit" name="submit" value="Sign-up" class="btn">
			<span class="login"><a href="login.php">Log-in</a></span>
		</form>
		<?php 
			session_start();
			include 'db.php';
			if (isset($_POST['submit'])) {
				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
				$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

				if ($user == '' || $pass1 == '' || $pass2 == '') {
					echo '<script>alert("Harap Lengkapi Username dan Password!")</script>';
					echo '<script>window.location="signup.php"</script>';
				} else {
					if ($pass2 != $pass1) {
					echo '<script>alert("Konfirmasi Password tidak sesuai!")</script>';
				} else {
					$cekuser = mysqli_num_rows(mysqli_query($conn, "SELECT username FROM tb_admin WHERE username = '".$user."' "));

						if ($cekuser > 0) {
							echo '<script>alert("Username telah terdaftar!")</script>';
							echo '<script>window.location="signup.php"</script>';
						} else {
							$insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (

										null,
										'".'Nama Pengguna'."',
										'".$user."',
										'".md5($pass1)."',
										'".'No.Telp'."',
										'".'Email'."',
										'".'Alamat Lengkap'."',
										'".'user'."')");
							if ($insert) {
								echo '<script>alert("Akun berhasil dibuat!")</script>';
								echo '<script>window.location="login.php"</script>';
							} else {
								echo 'gagal'.mysqli_error($conn);
							}
						}	
					}
				}				
			}
		 ?>

	</div>
</body>
</html>