<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการหนังสือที่ยืมไว้</title>
</head>
<body>
    <a href="page1.php" class="list" >Back</a><br><br>
</body>
</html>
<?php

    include("connectDB.php");
    $sql = "select * from list order by idbook";
    $result = mysqli_query($connect,$sql);
    ?>
    <table while=60% border=1>
        <tr><td>รหัสหนังสือ</td>
            <td>ชื่อหนังสือ</td>
            <td>วันที่ยืม</td>
            <td>วันที่คืน</td>
    <?php
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['idbook']."</td>";
            echo "<td>".$row['nbook']."</td>";
            echo "<td>".$row['bdate']."</td>";
            echo "<td>".$row['rdate']."</td></tr>";
        }
        echo "</table>";
    mysqli_close($connect);
?>