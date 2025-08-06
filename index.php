<!DOCTYPE html>
<html lang="en">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
<h2><center>เข้าสู่ระบบ</center></h2>
<form  method="post">
<table width=50% align="center">
  <div class="imgcontainer">
    <img src=img/L.jpg alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="id"><b>ID</b></label>
    <input type="text" placeholder="Enter ID" name="id" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" id="myInput" required>
    <input type="checkbox" onclick="myFunction()">แสดงรหัสผ่าน
    
    <button type="submit" name="submit">Login</button><br>
    <a href="register.php">Rigister</a><br>
    
  </div>
</table>
</form>
<script> 
    function myFunction() { 
        var x = document.getElementById("myInput"); 
        if (x.type === "password") { 
        x.type = "text"; 
        } else { 
        x.type = "password"; 
        } 
        } 
</script>
<?php
    
    session_start();
    include("connectDB.php");

    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE id = '$id' AND password = '$pass'";
    $result = mysqli_query($connect,$sql);

    if ($row = mysqli_fetch_assoc($result)) {
      // ถ้าพบผู้ใช้ ให้ตั้งค่า session และ redirect
      $_SESSION['user_id'] = $row['id'];  // เก็บ id ของผู้ใช้
      $_SESSION['is_admin'] = $row['is_admin'];  // ถ้าผู้ใช้เป็น admin จะเก็บค่าด้วย

      // ถ้าผู้ใช้เป็น admin หรือไม่ ก็จะถูกส่งไปหน้า page1.php
      header("Location: page1.php");
      exit();
  } else {
      echo "เกิดข้อผิดพลาด: รหัสผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
  }
?>
</body>
</html>