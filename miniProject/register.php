<?php
    session_start();

    include('connection.php');

    if(isset($_GET['submit']))  {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $stuid  = $_GET['stuid'];
        $groups  = $_GET['groups'];
        $bdate = $_GET['bdate'];
        $mobile = $_GET['mobile'];


        $user_check = "SELECT * FROM `student` WHERE `username` = '$username' LIMIT 1";
        $result = mysqli_query($conn,$user_check);
        $user = mysqli_fetch_assoc($result);

        if($user['username'] == $username){
            echo"<script>alert('มีการใช้งานผู้ใช้นี้แล้ว กรุณาเปลี่ยน');</script>";
        }
        else
        {
            $passwordenc = md5($password);

            $query = "INSERT INTO `student` (`username`, `password`, `stuid`, `fname`, `lname`, `groups`, `bdate`, `mobile`)
                        VALUES ('$username','$passwordenc','$stuid','$fname','$lname','$groups','$bdate','$mobile')";
            $result = mysqli_query($conn,$query);    
            
            if($result){
                $_SESSION['success'] = " ";
                header("Location:login.php");
               //echo"<script>alert('การลงทะเบียนเสร็จสิ้น');</script>";    
            }
            else{
              //  $_SESSION['error'] = "Something went wrong";
              //  header("Location:index1.php");
              echo"<script>alert('ชื่อผู้ใช้ หรือ รหัสผ่าน ผิด!!!');</script>";    
            }
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
    <title>Document</title>
    <style type="text/css">
        html{font-size: 62.5%;}
        body{font-size: 1.4em; font-family: 'Itim', cursive; background-image: url('image/cat.jpg');}
        .head{margin-top: 5%; border: 1px solid black; border-radius: 12px; background-color: #ededed;}
        .regis{text-align: center;  font-size: 3.5rem;  }
        .topic{padding-left:70%; font-size: 2rem;  font-weight: bold; }
        .col1{height: 400px;  background-color: chartreuse;}
        input[type=text]{ width: 40%;height: 36px; margin-top: 3px; font-size: 2rem;}
        input[type=password]{ width: 40%;height: 36px; margin-top: 3px; font-size: 2rem;}
        input[type=date]{ width: 40%;height: 36px; margin-top: 3px; font-size: 2rem;}
        input[type=submit] , input[type="button"]
        {
            background: blue; margin:10px 0 10px 0px ;  background-color: black;  color: white;
             border-radius: 90px; border-color:black ;  font-size: 2.3rem; width: 20%;
        }
        .important{color: red; font-size: 2rem;   font-weight: bold;} 
    </style>
</head>
    

<body>
      
    <div class="container head">
          <p  class="regis" style="font-weight: bold;">
              <i class="fa fa-smile-o"></i>  ลงทะเบียน  <i class="fa fa-smile-o"></i> 
         </p>
    </div>
    <div class="container">
            <div class="row">
                <div class="col" style=" margin-top: 20px; ">

                    <div class="container" >
                        <div class="row">
                            <div class="col-5" >
                                <div class="topic">
                                    <p style="margin-top: 10px; ">ชื่อผู้ใช้ : </p>
                                    <p>รหัสผ่าน :</p>
                                    <p>ชื่อจริง : </p>
                                    <p>นามสกุล : </p>
                                    <p>รหัสนักศึกษา : </p>
                                    <p>กลุ่มเรียน : </p>
                                    <p>ว/ด/ป เกิด :</p>
                                    <p>เบอร์มือถือ : </p>
                                </div>
                            </div>
                            <div class="col" >
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                                    <input type="text" name="username" placeholder="กรอกชื่อผู้ใช้" style="margin-top: 10px; " required> 
                                          <span class="important" >***จำเป็น</span>
                                    <br>
                                    <input type="password" name="password" placeholder="กรอกรหัสผ่าน" required> 
                                         <span class="important" >***จำเป็น</span>
                                    <br>
                                    <input type="text" name="fname" placeholder="ชื่อจริง" required> <br>
                                    <input type="text" name="lname" placeholder="นามสกุล" required> <br>
                                    <input type="text" name="stuid" placeholder="รหัสนักศึกษา" required>
                                         <span class="important" >***จำเป็น</span>
                                    <br>
                                    <input type="text" name="groups" placeholder="กลุ่มเรียน" required> <br>
                                    <input type="date" name="bdate" required> <br>
                                    <input type="text" name="mobile" placeholder="เบอร์มือถือ" required> <br>
                            </div>
                        </div>
                            <div style="margin:0 0 0 30%;">
                               <a href="login.php"> <input type="button" value="ยกเลิก" ></a>
                                <input type="submit" name="submit" value="ยืนยัน" style="margin-left: 8%;" >
                           </div>
                             </form>
                    </div>
                </div>
            </div>
    </div>

     
</body>
</html>
