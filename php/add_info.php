
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Info</title>
</head>

<body>

<?php
$email= $_POST['email'];
$lname = $_POST['lname'];
$birth = $_POST['birth'];
$sex = $_POST['sex'];
$smoke = $_POST['smoke'];
$interest = $_POST['interest'];
$time= date("Y-m-d H:i:s");


require('connectDB.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="INSERT INTO customer (email,lname,birth,sex,smoke,interest,time) VALUES ('$email','$lname','$birth','$sex','$smoke','$interest','$time')";
if (mysqli_query($conn, $sql)) {
    echo "<script>{window.alert('感謝您的關注，我們將儘快將產品推薦方案以郵件方式發送給您！');location.href='../index.html'}</script>";
} else {
	echo "<script>{window.alert('信息有誤！請再次檢查');}</script>";
}

?>
</body>
</html>
