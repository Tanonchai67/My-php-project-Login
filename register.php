<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
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

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
</head>
<body>

<form method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>ลงทะเบียน</h1>
    <p>กรุณากรอกแบบฟอร์มเพื่อสร้างบัญชี</p>
    <hr>

    <label for="id"><b>ID</b></label>
    <input type="text" placeholder="รหัสนักศึกษา" name="id" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="ชื่อ" name="name" required>

    <label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="นามสกุล" name="lastname" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="รหัสผ่าน" name="pass" id="showpass" required>
    <input type="checkbox" onclick="myFunction()">แสดงรหัสผ่าน <br><br>

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Reset</button>
      <button type="submit" class="signupbtn" name="submit">Sign Up</button>
    </div>
  </div>
  <center><a href="index.php">Back</a><center><br>
</form>
<script> 
    function myFunction() { 
        var x = document.getElementById("showpass");
        if (x.type === "password") { 
        x.type = "text"; 
        } else { 
        x.type = "password"; 
        } 
        }
</script>
<?php
    include("connectDB.php");
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $pass = $_POST['pass'];
        
        $sql = "select * from user where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $num = mysqli_num_rows($result);
        if($num == 0)
        {
            $sql = "insert into user value ('$id','$name','$lastname','$pass')";
            $result = mysqli_query($connect,$sql);
            if($result)
            {
                echo "สถานะ : ลงทะเบียนสำเร็จ";
            }else
            {
                echo "สถานะ : ลงทะเบียนไม่สำเร็จ";
            }
        }else
        {
            echo "สถานะ : มีบัญชีอยู่แล้ว";
        }
        mysqli_close($connect);
    }
?>
</body>
</html>
