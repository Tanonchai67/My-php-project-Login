<?php
    include("connectDB.php");
    $sql = "select * from user order by id";
    $result = mysqli_query($connect,$sql);
    ?>
    <table while=60% border=1>
        <tr><td>รหัสนักศึกษา</td>
            <td>ชื่อ</td>
            <td>นามสกุล</td>
            <td>รหัสผ่าน</td>
    <?php
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['password']."</td></tr>";
        }
        echo "</table>";
    mysqli_close($connect);
?>