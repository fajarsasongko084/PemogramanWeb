<?php
	$host="localhost"; // biasanya localhost
	$username="root";
	$password="";
	$db="login"; 
	 
	$connect_error = "database tidak bisa dipilih";
	$conn = mysqli_connect("$host", "$username", "$password") or die("koneksi gagal");
	mysqli_select_db($conn,"$db") or die ($connect_error);

	if ($conn){
	echo "success";
	} else {
	echo "failure";
	}
	 
	// mengambil data username dan password dari index.php
	// bila form method nya GET maka ganti POST menjadi GET
	$username=$_POST['username'];
	$password=$_POST['password'];
	 
	// untuk keamanan
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);
	 
	$sql="SELECT * FROM member WHERE username='$username' and password='$password'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	 
	if($count==1){
		echo "<script>;</script>";
	}
	else {
		echo "Username atau Password yang anda masukkan salah";
	}
?>