<?PHP
	session_start();
	if(empty($_SESSION['ID']) || empty($_SESSION['NAME']) || empty($_SESSION['SURNAME'])){
		echo '<script>window.location = "Login1.php";</script>';
	}
?>
 Your Detials
 <hr>
<?PHP
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "NAME : ".$_SESSION['NAME']."<br>";
	echo "SURNAME : ".$_SESSION['SURNAME']."<br><br><br>";
	echo "<a href='PasswordChange1.php'>Change Password</a><br>";
	echo "<a href='Logout1.php'>Logout</a>";
?>