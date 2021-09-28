<?php
session_start();
$servername="localhost";
$username="root";
$password="goeundo0112";
$database="web_db";
$con=mysqli_connect($servername,$username,$password,$database)
     or die("Mysql Connect Error!");

if (isset($_SESSION['uid']))
{
  echo "<br>";
}
else
{
  header('location:http://localhost:81/login.php');
}
?>

<meta charset='UTF-8'>
<!DOCTYPE html>
<html>
<head>
  <title>
    인덱스 페이지
  </title>
</head>

<body>
  <h1>INDEX</h1>

  <?php
  $sel_query="SELECT * FROM member WHERE id LIKE '{$_SESSION['uid']}';";
  $sel_result=mysqli_query($con,$sel_query) or die("Query Error!");
  $record=mysqli_fetch_array($sel_result);

  echo "<br>
  <b>{$record['name']}의 페이지입니다</b><br>
  login ID : {$record['id']} <br>
  login PW : {$record['pw']} <br>
  your email is {$record['email']} <br>
  your sex is {$record['sex']}<br><br>
  <input type=\"button\" value=\"로그아웃\" onclick=\"location.href='http://localhost:81/logout.php'\"><br><br>";
  ?>
</body>
</html>
