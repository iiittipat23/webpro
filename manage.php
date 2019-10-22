<?php
    include 'database.php';
    
    if($_GET['flag']==1){//แก้ไขข้อมูลลูกค้า
        $Customer_id = $_GET['id'];
        //echo "$Customer_id";
        $sql = "UPDATE customer SET Customer_Name='$_POST[fristname]',Customer_Lastname='$_POST[lastname]',Birthdate='$_POST[birthdate]',
                                    Age='$_POST[age]',Address='$_POST[address]',Province='$_POST[province]',Zipcode='$_POST[zipcode]',
                                    Telephone='$_POST[telephone]',Customer_Description='$_POST[description]' WHERE  Customer_id = '$Customer_id'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
    }////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    else if($_GET['flag']==2){//ลบข้อมูลลูกค้า
        $Customer_id = $_GET['id'];
        $sql = "DELETE FROM customer WHERE Customer_id = '$Customer_id'";
        $result2 = mysqli_query($conn,$sql);
        mysqli_free_result($result2);
    }////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    else if($_GET['flag']==3){//เพิ่มข้อมูลลูกค้า
        $countid = mysqli_query($conn,"SELECT * from customer order by Customer_id desc limit 1") 
        or die("SQL error1=".mysqli_error($conn));
        
        while (list($Customer_id) = mysqli_fetch_row($countid)){
            $numid = $Customer_id;
        }$numid++;        

        $sql = "INSERT INTO customer (Customer_id,Customer_Name,Customer_Lastname,Gender,Age,Birthdate,Address,Province,Zipcode,
                                      Telephone,Customer_Description,Email,username,password)
        value ('$numid','$_POST[fristname]','$_POST[lastname]','$_POST[gender]','$_POST[age]','$_POST[birthdate]','$_POST[address]',
               '$_POST[province]','$_POST[zipcode]','$_POST[telephone]','$_POST[description]','$_POST[email]','$_POST[username]','$_POST[password]')";
        
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        mysqli_free_result($countid);
    }
    mysqli_close($conn);
    header("location:Lab8_59543206023-3.php");
?>