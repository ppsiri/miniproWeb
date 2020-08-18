<?php
   session_start();

    require_once "connection.php";

    if(isset($_POST['submit']))  {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
     
        $user_check = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn,$user_check);
        $user = mysqli_fetch_assoc($result);

        if($user['username'] == $username){
            echo"<script>alert('มีการใช้งานผู้ใช้นี้แล้ว กรุณาเปลี่ยน');</script>";
        }
        else{
            $passwordenc = md5($password);

            $query = "INSERT INTO users (username,password,firstname,lastname,userlevel)
                        VALUE ('$username','$passwordenc','$firstname','$lastname','m')";
            $result = mysqli_query($conn,$query);    
            
            if($result){
                $_SESSION['success'] = "Insert users success";
                header("Location:index1.php");
            }
            else{
                $_SESSION['error'] = "Something went wrong";
                header("Location:index1.php");
            }
        }
    }
    


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
        <title>สมัครสมาชิก</title>
    </head>
    <body>
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           <label for="username">Username : </label>
           <input type="text" name="username" placeholder="Username" required>
           <br>
           <label for="password">Password : </label>
           <input type="password" name="password" placeholder="Password" required>
            <br>
           <label for="firstname">Firstname : </label>
           <input type="text" name="firstname" placeholder="Firstname" required>
           <br>
           <label for="lastname">Lastname : </label>
           <input type="lastname" name="lastname" placeholder="lastname" required>
            <br>
           <input type="submit" name="submit" value="register">
       </form>
       <a href="index1.php">กลับไปหน้าแรก</a>
    </body>
</html>