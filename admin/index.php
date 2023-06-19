<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = sha1($password); // Menggunakan hash SHA1

    $sql = "SELECT * FROM TB_ADMIN WHERE USERNAME = :username AND PASSWORD = :password";
    $stmt = oci_parse($con, $sql);

    oci_bind_by_name($stmt, ':username', $username);
    oci_bind_by_name($stmt, ':password', $hashedPassword);

    oci_execute($stmt);

    $row = oci_fetch_assoc($stmt);

    if ($row) {
        $_SESSION['admin'] = $row['ID_ADMIN'];

        // Redirect ke halaman dashboard atau halaman lainnya
        header('Location:dashboard.php');
        exit;
    } else {
        $errorMessage = "Username atau Password salah.";
    }
}

oci_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/img/logo_absensi.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/_login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="login100-form validate-form">
					<span class="login100-form-title p-b-48">
						<!-- <i class="zmdi zmdi-font"></i> -->
						<img src="../assets/img/logo_absensi.png" width="100">
					</span>
					<span class="login100-form-title p-b-26">
						ABSENSI KUY ADMIN
					</span>
					


					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

				
				</form>

									<!-- <?php 
									if ($_SERVER['REQUEST_METHOD']=='POST') {
									$pass= sha1($_POST['password']);
									// $sqlCek = mysqli_query($con,"SELECT * FROM tb_admin WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'");
									// $jml = mysqli_num_rows($sqlCek);
									// $d = mysqli_fetch_array($sqlCek);
									$query = "SELECT * FROM TB_ADMIN WHERE USERNAME='$_POST[username]' AND password='$pass' AND AKTIF='Y'";
                    				$stmt = oci_parse($con, $query);
									// $jml = oci_num_rows($query);
                    				oci_execute($stmt);
									$d = oci_fetch_array($stmt);
									
									if ($jml > 0) {
									$_SESSION['ADMIN']= $d['ID_ADMIN'];
									
									
									echo "
									<script type='text/javascript'>
									setTimeout(function () { 
									
									swal('(Administrator) ', 'Login berhasil', {
									icon : 'success',
									buttons: {        			
									confirm: {
									className : 'btn btn-success'
									}
									},
									});    
									},10);  
									window.setTimeout(function(){ 
									window.location.replace('./dashboard.php');
									} ,3000);   
									</script>";
									
									
									
									
									}else{
									echo "
									<script type='text/javascript'>
									setTimeout(function () { 
									
									swal('Sorry!', 'Username / Password Salah', {
									icon : 'error',
									buttons: {        			
									confirm: {
									className : 'btn btn-danger'
									}
									},
									});    
									},10);  
									window.setTimeout(function(){ 
									window.location.replace('index.php');
									} ,3000);   
									</script>";
									}
									}
									?> -->

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../assets/_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/_login/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../assets/_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="../assets/_login/js/main.js"></script>


</body>
</html>