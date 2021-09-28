<?php
session_start();

$servername="localhost";
$username="root";
$password="goeundo0112";
$database="web_db";
$con=mysqli_connect($servername,$username,$password,$database)
     or die("Mysql Connect Error!");

$sel_query="SELECT * FROM member WHERE id LIKE '{$_POST['id']}';";
$sel_result=mysqli_query($con,$sel_query)or die("Query Error!");
$count=mysqli_num_rows($sel_result);

  if($count==0)
  {
    echo "<a href='http://localhost:81/register.html'>가입하러 가기</a>";
  }
  else
  {
    $row=mysqli_fetch_array($sel_result);
    $dbpassword=$row['pw'];

    if($_POST['pw']==$dbpassword)
    {
      $_SESSION['uid']=$_POST['id'];
      header('location:http://localhost:81/index.php');
    }
    else
    {
      echo "<a href='http://localhost:81/login.php'>다시 로그인하기</a>";
    }

  }

?>
