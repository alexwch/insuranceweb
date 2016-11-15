<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
</head>

<body>

<?php
$ID = $_POST['name'];
$pwd = $_POST['pwd'];

require('connectDB.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM user WHERE userid = '$ID' AND pwd = '$pwd'";
$result = mysqli_query($conn, $sql);

$_session["id"]=$ID;
if (mysqli_num_rows($result) > 0) {
 echo  header('Location: ../admin.html');
}else{
 echo "Wrong PWD !!";
 //echo header('Location: login.html?refer='. urlencode($_POST['refer']));
}

?>

</body>
</html>
