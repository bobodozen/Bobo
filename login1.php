<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("system", "Tlee2537", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	}
?>
 Login
 Site
<hr>

<?PHP
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$confirmCode = trim($_POST['confirmCode']);
		
		$query = "SELECT * FROM LOGIN1 WHERE username='$username' and password='$password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
	
		if($row){
			if($confirmCode == 11111) {
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['NAME'] = $row['NAME'];
			$_SESSION['SURNAME'] = $row['SURNAME'];
			echo '<script>window.location = "MemberPage1.php";</script>';
			}
			else { echo "Invalid Confirm Password."; }
		}
		else{
			echo "Login fail.";
		}
	};
	oci_close($conn);
?>

<form action='login1.php' method='post'>
	<p>Username<br>
	<input name='username' type='input'><br>
	Password<br>
	<input name='password' type='password'><br><br><br>
    Comfirm Code <br>
    ( 11111 )<br>
    <input name='confirmCode' type='input'><br><br>
    <input name='submit' type='submit' value='Login'>
	</p>
</form>
