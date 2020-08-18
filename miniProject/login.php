<?php
    session_start();
    include('connection.php');
    
    if( isset($_POST['username']) ){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM student WHERE username = '$username' AND password = '$passwordenc' ";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);

            $_SESSION['stuid'] = $row['stuid'];
           // $_SESSION['user'] = $row['firstname']. " " . $row['lastname'];
        
                header("Location: home1.php");

        }
        else {
            //echo "Username and Password Incorrect!";
            echo"<script>alert('ชื่อผู้ใช้ หรือ รหัสผ่าน ผิด!!!');</script>";    
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
    <title>Login</title>
    <style type="text/css">
        html{font-size: 62.5%;}
        body{font-size: 1.4em; font-family: 'Itim', cursive; background-image: url('image/cat.jpg'); }
        .container{margin-top: 10%;}
        label{font-size:2em; }
        .input{width: 70%; height: 40px; font-size: 2.2rem;}
        hr{border:2px solid black; margin-right:30% ;}
        .login { border:1px solid black; padding-left: 12%;}
        input[type=submit],input[type=button]{background-color: black; color: white; border-radius: 90px; border-color:black ;
             font-size: 1.4em; width: 30%; margin-right: 10%; margin-bottom: 5%;
        }
        .success{width: 50%; margin: 0 auto; padding: 10px;  border: 1px solid #455451;  color: #004a59;
                background-color: #d1fff6; border-radius: 5px;text-align:center; margin-bottom: 20px;
                font-size: 2rem;
         }
    </style>
</head>
  
<body>
		
        <?php  if(isset($_SESSION['success'])) :    ?>
                    <div class="success">
                        การลงทะเบียนเสร็จสิ้น <br> คุณสามารถเข้าสู่ระบบได้
                    </div>
        <?php endif; ?>
       
    <div class="container" >
        <div class="row">
            <div class="col-3" ></div>
            <div class="col-6 login" >
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <p style="font-size: 3em;"> <i class="fa fa-users"></i>  
                        เข้าสู่ระบบ 
                    </p>
                    <hr>
                    <label for="username">
                        ชื่อผู้ใช้   <i class="fa fa-user-circle"></i> 
                    </label><br>
                    <input type="text" name="username" class="input"  placeholder="กรอกชื่อผู้ใช้" required><br>
                    <label for="password">
                        รหัสผ่าน  <i class="fa fa-lock"></i>
                    </label><br>
                    <input type="password" name="password" class="input"  placeholder="กรอกรหัสผ่าน" required><br><br>
                    <input type="submit" value="เข้าสู่ระบบ">
                    <a href="register.php"> <input type="button" value="ลงทะเบียน"> </a>
                </form> 
            </div>      
        </div>
    </div>
    
</body>
</html>
    <?php
        if(isset($_SESSION['success']) || isset($_SESSION['error'])){
            session_destroy();
        }
    ?>
