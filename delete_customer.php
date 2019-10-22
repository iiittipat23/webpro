<?php
    session_start();
    include 'database.php';
    $result = mysqli_query($conn,"SELECT * FROM customer WHERE Customer_id = '$_GET[id]'");
    list($Customer_id,$Customer_Name,$Customer_Lastname,$Gender,$Age,$Birthdate,$Address,$Province,$Zipcode,$Telephone,$Customer_Description,$Email,$username)=mysqli_fetch_row($result);

    $result1 = mysqli_query($conn,"SELECT * FROM province ");

    if(empty($_SESSION['valid_user'])){//ถ้ายังไม่ได้ login
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ลบข้อมูลลูกค้า</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div id="header">
            ยืนยันการลบข้อมูลลูกค้า
        </div>
        <font style="background:chartreuse">Infomation cutomer ID <?php echo "$_GET[id]" ?></font>
        <div align="center">
            <form action="manage.php?flag=2?&id=<?php echo "$_GET[id]" ?>" method="POST">
                <fieldset id="layer2">
                    <div id="boxtopic">
                        E-mail : <br>
                        Username : <br>
                        Frist Name : <br>
                        Last Name : <br>
                        Gender : <br>
                        Brithday : <br>
                        Age : <br>
                        Address : <br>
                        Porvince : <br>
                        Zipcode : <br>
                        Telephone : <br>
                        Description : <br>
                    </div>
                    <div id="boxinfo" style="color: black;">
                        <?php echo $Email?><br>
                        <?php echo $username?><br>
                        <?php echo $Customer_Name?><br>
                        <?php echo $Customer_Lastname?> <br>
                        <?php echo $Gender?><br>
                        <?php echo $Birthdate?><br>
                        <?php echo $Age?><br>
                        <?php echo $Address?><br>
                        <?php echo $Province?><br>
                        <?php echo $Zipcode?><br>
                        <?php echo $Telephone?><br>
                        <?php echo $Customer_Description?><br>
                    </div>
                    <div align="center">
                        <?php echo "<input class='button button3' type='submit' value='ลบข้อมูลที่เลือก' onclick=\"return confirm('ยืนยันที่จะลบ')\"> "; ?>
                        <input type="button" onclick="window.location.href='Lab8_59543206023-3.php'" value="ยกเลิก">
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="footer">
            WEB PROGRAMING LAB8 | Copyright©2019 , Powerby ITTIPAT.
        </div>
    </body>
</html>

<?php
    mysqli_free_result($result);
    mysqli_free_result($result1);
    mysqli_close($conn);
?>