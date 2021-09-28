<?php
session_start();

if(!isset($SESSION['loginok']))
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>로그인</h3>
    <form method="POST" action="http://localhost:81/login_check.php">
      아이디 <input type="text" name="id"><br>
      <br>비밀번호 <input type="password" name="pw"><br>
      <br><input type="submit"value="로그인">
    <input type="button" value="가입하기" onclick="location.href='http://localhost:81/register.html'">
    </form>
  </body>
</html>
<?php
}
else
{
  header('location:http://localhost:81/index.php');
}
?>
