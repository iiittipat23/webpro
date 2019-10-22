<?php
    session_start();
    include 'database.php';
    $result = mysqli_query($conn,"SELECT * FROM province ");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>เพิ่มข้อมูลลูกค้า</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div id="header">
            เพิ่มข้อมูลลูกค้า
        </div>
        <div>
        <?php
            if(empty($_SESSION['valid_user'])){//ถ้ายังไม่ได้ login
                header("location:login.php");
            }
            else{
                echo "<h3>Managed by : ",$_SESSION['valid_user']," </h3>";
            }
        ?>
        </div>
        <div align="center">
            <form action="manage.php?flag=3" method="POST">
            <fieldset id="layer1">
                <fieldset id="layer2"><legend><h2>Personal Information</h2></legend>
                    <div id="boxtopic">
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
                    <div id="boxinfo">
                        <input type="text" name="fristname" maxlength="15" required><br>
                        <input type="text" name="lastname" maxlength="15" required> <br>
                        <input type="radio" name="gender" value="Mail" checked> ชาย
                        <input type="radio" name="gender" value="Femail"> หญิง <br>
                        <input type="date" name="birthdate"><br>
                        <input type="text" name="age" maxlength="2"><br>
                        <input type="text" name="address"><br>
                        <?php
                            echo "<select name='province'>";
                            while (list($province) = mysqli_fetch_row($result)){
                                echo "<option value='$province'>$province</option>";
                            }
                            echo "</select>";
                            mysqli_free_result($result);
                            mysqli_close($conn);
                        ?>
                        <br>
                        <input type="text" name="zipcode"><br>
                        <input type="text" name="telephone"><br>
                        <textarea name="description" rows="10" cols="50"></textarea><br>
                    </div>
                </fieldset>

                <fieldset id="layer2"><legend><h2>Account Information</h2></legend>
                    <div id="boxtopic">
                        E-mail : <br>
                        Username : <br>
                        Password : <br>
                        Confirm Password : <br>
                    </div>
                    <div id="boxinfo">
                        <input type="email" name="email" placeholder="student@gmail.com" required><br>
                        <input type="text" name="username" maxlength="10" placeholder="Enter Username" required><br>
                        <input type="password" name="password" maxlength="10" placeholder="Enter Password" required><br>
                        <input type="password" name="re-password" maxlength="10" placeholder="Enter Password Again" required><br>
                    </div>
                    <div align="center">
                        <input type="checkbox" required> I agree to the Terms of Service and Privacy Policy.<br>
                        <input class="button" type="submit" value="เพิ่มข้อมูลลูกค้า">
                        <input class="button" type="reset" value="ยกเลิก">
                        <input type="button" onclick="window.location.href='Lab8_59543206023-3.php'" value="กลับหน้าหลัก">
                    </div>
                </fieldset>
            </fieldset>
            </form>
        </div>
        <div id="footer">
            WEB PROGRAMING LAB8 | Copyright©2019 , Powerby ITTIPAT.
        </div>
    </body>
</html>