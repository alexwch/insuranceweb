<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

require('connectDB.php');


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `customer` order by time desc";
$result = mysqli_query($conn, $sql);
$List="<table><tr align='left' style='height:30px'><th style='width:20%'>Email</th>
				  <th style='width:10%'>姓氏</th>
				  <th style='width:10%'>生日年月</th>
				  <th style='width:10%'>性別</th>
				  <th style='width:10%'>是否吸煙</th>
				  <th style='width:20%'>感興趣的產品</th>
				  <th style='width:30%'>登記時間</th></tr>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//Click On List
		$List.="<tr><td style='width:20%'><a href='mailto:".$row["email"]."'>".$row["email"]."</a></td>
		<td style='width:10%'>".$row["lname"]."</td>
		<td style='width:10%'>".$row["birth"]."</td>
		<td style='width:10%'>".$row["sex"]."</td>
		<td style='width:10%'>".$row["smoke"]."</td>
		<td style='width:20%'>".$row["interest"]."</td>
		<td style='width:30%'>".$row["time"]."</td></tr>";
    }

} else {
    echo "0 results";
}
$List.="</table>";
echo $List;

mysqli_close($conn);
?>
</body>
</html>
