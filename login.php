<?php 
	error_reporting(0);
	session_start();
	if ($_SESSION['status_login']==true) {
		echo '<script>window.location="menu-utama.php"</script>';
	}
 ?>

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
		<h2>Login</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="btn">
			<span class="signup"><a href="signup.php">Sign-up</a></span>
		</form>
		<?php 
			session_start();
			include 'db.php';
			if (isset($_POST['submit'])) {
				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".md5($pass)."'");
				$r = mysqli_fetch_object($cek);
				$level = $r->level;
				if (mysqli_num_rows($cek) > 0) {
					if ($level == 'admin') {
						$_SESSION['status_login'] = true;
						$_SESSION['a_global'] = $r;
						$_SESSION['id'] = $r->admin_id;
						echo '<script> window.location="dashboard.php" </script>';
					} elseif ($level == 'user') {
						$_SESSION['status_login'] = true;
						$_SESSION['a_global'] = $r;
						$_SESSION['id'] = $r->admin_id;
						echo '<script> window.location="menu-utama.php" </script>';
					}else {
						echo '<script> alert("Username atau Password Anda salah!") </script>';
					}
				} else {
					echo '<script> alert("Username atau Password Anda salah!") </script>';
				}
			}
		 ?>

	</div>
</body>
</html>