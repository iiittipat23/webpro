<?php
    session_start();
    include 'database.php';
    $sql = mysqli_query($conn,"SELECT * FROM customer");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>LAB8</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        body{
            text-align: center;
            font-family: 'MS Sans Serif';}

    </style>
</head>
<body>
    <div id="header">
        ข้อมูลลูกค้า
    </div>
	</div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <div align="right" style="background-color:burlywood; color: black;">
                    <?php
                        if(empty($_SESSION['valid_user'])){//ถ้ายังไม่ได้ login
                            header("location:login.php");
                        }
                        else{
                            echo "<h5>ยินดีต้อนรับคุณ : ",$_SESSION['valid_user']," </h5>";
                        }
                    ?>
                </div>
                <div align="right" style="margin-bottom: -15px; margin-top: -20px;">
                    <a href ="logout.php">ออกจากระบบ</a>
                </div>
                <div align="center">
                    <?php
                        echo "<table width='100%' border='2'>";
                        echo "<tr class='topic'>
                                <th>ID</th>
                                <th>ชื่อ - สกุล</th>
                                <th>จังหวัด</th>
                                <th>โทรศัพท์</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>";
                        $i=0;
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $i++;
                            if($i%2 == 0){
                                $bg = "#f2f2f2";
                            }else{
                                $bg = "#ffffff";
                            }
                            echo "<tr bgcolor='$bg'>
                                    <td class='td1'>".$row['Customer_id']."</td>
                                    <td>".$row['Customer_Name']." ".$row['Customer_Lastname']."</td>
                                    <td class='td1'>".$row['Province']."</td>
                                    <td class='td1'>".$row['Telephone']."</td>
                                    <td class='td1'> <a href='edit_customer.php?&id=".$row['Customer_id']."'> 
                                                     <img src='https://uppic.cc/d/5Z1Z' width='20px'> </a></td>
                                    <td class='td1'> <a href='delete_customer.php?id=".$row['Customer_id']."'> 
                                                     <img src='https://uppic.cc/d/5Z1s' width='20px'> </a> </td>
                                </tr>";
                        }
                        echo "</table><br>";
                    ?>
                </div>
                <div align="right">
                    <a href="add_customer.php"><h5><u>เพิ่มข้อมูลลูกค้า</u></h5></a>
                </div>
                <div align="center">
                    <img src="https://uppic.cc/d/5ZU8" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        WEB PROGRAMING LAB8 | Copyright©2019 , Powerby ITTIPAT.
    </div>
</body>
</html>