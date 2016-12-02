<?php
###############################################################################################
######  Nama file : login.php								#######
######  Programmer: syamsuddin								#######
######  Lisensi	  : gpl									#######
######  Dibuat    : 1 Nopember 2016, 15:34WITA						#######
######  Deskripsi : halaman login intan							#######
###############################################################################################

	include 'config.php';
	$title  = 'Login';
	include 'header.php';
	
	if (isset($_SESSION['login_user'])){
	header('Location:index.php');
	};

	$error ='Admin area, silakan login!.';

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername=$_POST['username']; 
		$mypassword=$_POST['password']; 

		$sql='SELECT * FROM user WHERE (Username="'.$myusername.'" and Password="'.$mypassword.'")';
		
		$result=mysqli_query($db_link,$sql);
		$count=mysqli_num_rows($result);

	if($count==1){
	$_SESSION['login_user']=$myusername;
	header("location:index.php");
		}
	else 	{
		$error="Nama atau password anda salah!";
	    }
	}

?>
    <tr bgcolor="#FFFFFF">
      <td>
        <div align="center">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="login">
    	<h1>SILAKAN LOGIN</h1>
    	<input type="text" name="username" class="login-input" placeholder="Nama" autofocus>
    	<input type="password" name="password" class="login-input" placeholder="Password">
    	<input type="submit" name="submit" value="Login" class="login-submit">
   	<p><font color="white"><?php echo $error; ?></font></p>
  	</form>
        </div>
       </td>
    </tr>

<?php
include 'footer.php';
?>




#######################

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername=$_POST['username']; 
		$mypassword=$_POST['password']; 

		$sql='SELECT * FROM user WHERE (Username="'.$myusername.'" and Password="'.$mypassword.'")';
		
		$result=mysqli_query($db_link,$sql);
		$count=mysqli_num_rows($result);

	if($count==1){
	$_SESSION['login_user']=$myusername;
	header("location:index.php");
		}
	else 	{
		$error="Nama atau password anda salah!";
	    }
	}

?>
  <div class="ribbon"></div>
  <div class="login2">
  <h1>Login</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="input2">
      <div class="blockinput2">
        <i class="icon-envelope-alt"></i><input type="mail" placeholder="Username" name="username" class="input2">
      </div>
      <div class="blockinput2">
        <i class="icon-unlock"></i><input type="password" placeholder="Password" name="password" class="input2">
      </div>
    </div>
    <button class="button2">Login</button>
  </form>
  <br />
  <p><?php echo $error; ?></p>
  </div>
  <br>

<?php
	include "footer.php";
?>
