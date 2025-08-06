<!DOCTYPE html>
<html lang="en">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.container {
  padding: 16px;
}

button {
  background-color: #ee82ee;
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

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

.back, .list {
  float: left;
  width: 50%;
}

.back {
  padding: 14px 20px;
  background-color: #6a5acd;
}

.list {
  padding: 14px 20px;
  background-color: #3cb371;
}

@media screen and (max-width: 300px) {
  .back, .list {
     width: 100%;
  }
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืมหนังสือ</title>
</head>
<body>
<form  method="post" style="border:2px solid #ccc">
    <div class="container">
    
    <label for="idbook"><b>รหัสหนังสือ</b></label>
    <input type="text" placeholder="กรอกข้อมูล" name="idbook" required>
    
    <label for="nbook"><b>ชื่อหนังสือ</b></label>
    <input type="text" placeholder="กรอกข้อมูล" name="nbook" required>

    <label for="bdate"><b>วันที่ยืม</b></label>
    <input type="date"  name="bdate" required>

    <label for="rdate"><b>วันที่คืน</b></label>
    <input type="date"  name="rdate" required><br><br>
    
    <div class="clearfix">
      <button type="reset" class="cancelbtn">Reset</button>
      <button type="submit" name="submit" class="signupbtn">Enter</button>
    </div>
    <div class="clearfix">
    <center><a href="logout.php" class="back" onclick="return confirm('ยืนยันการออกจากระบบ')">Logout</a><center>
    <center><a href="page2.php" class="list" >List</a><center>
    </div>
  </div>
</form>
<?php
    session_start();
    if(!isset($_SESSION['is_admin']))
    {
      header("location : index.php");
      die();
    }
    include("connectDB.php");
    if(isset($_POST['submit']))
    {
        $idbook = $_POST['idbook'];
        $nbook = $_POST['nbook'];
        $bdate = $_POST['bdate'];
        $rdate = $_POST['rdate'];
        
        $sql = "select * from list where idbook = '$idbook'";
        $result = mysqli_query($connect,$sql);
        $num = mysqli_num_rows($result);
        if($num == 0)
        {
            $sql = "insert into list value ('$idbook','$nbook','$bdate','$rdate')";
            $result = mysqli_query($connect,$sql);
            if($result)
            {
                echo "สถานะ : ลงข้อมูลสำเร็จ";
            }else
            {
                echo "สถานะ : ลงข้อมูลไม่สำเร็จ";
            }
        }else
        {
            echo "สถานะ : มีข้อมูลอยู่แล้ว";
        }
        mysqli_close($connect);
    }

?>
</body>
</html>