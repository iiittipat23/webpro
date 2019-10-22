<?php
    session_start();
    include 'database.php';
    $result = mysqli_query($conn,"SELECT * FROM customer WHERE Customer_id = '$_GET[id]'") 
    or die("SQL error2 = ".mysqli_error($conn));
    list($Customer_id,$Customer_Name,$Customer_Lastname,$Gender,$Age,$Birthdate,$Address,$Province,$Zipcode,$Telephone,$Customer_Description)=mysqli_fetch_row($result);

    $result1 = mysqli_query($conn,"SELECT * FROM province ") 
    or die("SQL error2 = ".mysqli_error($conn));

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
        <title>แก้ไขข้อมูลลูกค้า</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div id="header">
            แก้ไขข้อมูลลูกค้า
        </div>
        <font style="background:chartreuse">CUSTOMER ID <?php echo "$_GET[id]" ?></font>
        <div align="center">
            <form action="manage.php?flag=1?&id=<?php echo "$_GET[id]" ?>" method="POST">
                <fieldset id="layer2">
                    <div id="boxtopic">
                        Frist Name : <br>
                        Last Name : <br>
                        Brithday : <br>
                        Age : <br>
                        Address : <br>
                        Porvince : <br>
                        Zipcode : <br>
                        Telephone : <br>
                        Description : <br>
                    </div>
                    <div id="boxinfo">
                        <input type="text" name="fristname" maxlength="15" required value="<?php echo $Customer_Name?>"><br>
                        <input type="text" name="lastname" maxlength="15" required value="<?php echo $Customer_Lastname?>"> <br>
                        <input type="date" name="birthdate" value="<?php echo $Birthdate?>"><br>
                        <input type="text" name="age" maxlength="2" value="<?php echo $Age?>"><br>
                        <input type="text" name="address" value="<?php echo $Address?>"><br>
                        <?php
                            echo "<select name='province'>";
                            echo "<option>$Province</option>";
                            while (list($province) = mysqli_fetch_row($result1)){
                                if($province != $Province){
                                    echo "<option value='$province'>$province</option>";
                                }
                            }
                            echo "</select>";
                            mysqli_free_result($result1);
                            mysqli_close($conn);
                        ?>
                        <br>
                        <input type="text" name="zipcode" value="<?php echo $Zipcode?>"><br>
                        <input type="text" name="telephone" value="<?php echo $Telephone?>"><br>
                        <textarea name="description" rows="10" cols="50"><?php echo $Customer_Description?></textarea><br>
                    </div>
                    <div align="center">
                        <input class="button" type="submit" value="แก้ไขข้อมูลลูกค้า">
                        <input class="button" type="reset" value="ยกเลิก">
                        <input type="button" onclick="window.location.href='Lab8_59543206023-3.php'" value="กลับหน้าหลัก">
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="footer">
            WEB PROGRAMING LAB8 | Copyright©2019 , Powerby ITTIPAT.
        </div>
    </body>
</html>