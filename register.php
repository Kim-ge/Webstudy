<meta charset='UTF-8'>
<!DOCTYPE html>
<html>
  <head>
    <title>가입 확인 중</title>
  </head>
  <body>
    <h1>가입이 유효한지 확인했습니다.</h1>

    <?php
      session_start();
      $servername="localhost";
      $username="root";
      $password="goeundo0112";
      $database="web_db";
      $con=mysqli_connect($servername,$username,$password,$database)
           or die("Mysql Connect Error!");

      $num_result=mysqli_query($con,"SELECT * FROM member;")or die("Query Error!");
      $number=mysqli_num_rows($num_result);
      $ins_query="INSERT INTO member VALUES(".$number.",'".$_POST['id']."','".$_POST['pw']."','".$_POST['name']."','".$_POST['email']."','".$_POST['sex']."')";

      mysqli_query($con,$ins_query)or die("Query Error2");

      $sel_query="SELECT * FROM member WHERE id LIKE '{$_POST['id']}';";
      $sel_result=mysqli_query($con,$sel_query)or die("Query Error3");
      $record=mysqli_fetch_array($sel_result);

      echo "당신의 정보를 확인하세요!<br>
      login ID : {$record['id']}<br/>
      login PW : {$record['pw']}<br/>
      your email is {$record['email']}<br/>
      your name is {$record['name']}<br/>
      your sex is {$record['sex']}<br/><br/>";

      $_SESSION['uid']=$_POST['id'];

      echo "<br> <input type=\"button\" name=\"complete\" value=\"가입완료\" onclick=\"location.href='http://localhost:81/login.php'\"><br>";
    ?>
   </body>
</html>
