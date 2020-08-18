<?php
    session_start();
    include('connection.php');
    if(isset($_GET['submit']))
    {

       $query1 = "SELECT * FROM student WHERE stuid = '".$_SESSION['stuid']."' ";
       $result1 = mysqli_query($conn,$query1);
       $row1 = mysqli_fetch_assoc($result1);
       
         
            $query2 = "SELECT  sub.subname ,sub.id FROM 
                        (SELECT * FROM student)AS st
                        INNER JOIN
                        (SELECT * FROM student_subject )AS stu_sub
                        ON st.stuid = stu_sub.stuid
                        INNER JOIN
                        (SELECT * FROM subject)AS sub
                        ON stu_sub.subid = sub.id
                        WHERE st.stuid = '".$_SESSION['stuid']."' ";
              $result2 = mysqli_query($conn,$query2);


        $subid = $_GET['subid'];

        $query3 = "SELECT sub.subid , sub.subname , sub.credit , sub.grade , teach.fname , teach.lname  FROM
                    (SELECT * FROM teacher)AS teach
                    INNER JOIN
                    (SELECT * FROM teacher_subject)AS teach_sub
                    ON teach.teachid = teach_sub.teachid
                    INNER JOIN
                    (SELECT * FROM subject)AS sub 
                    ON teach_sub.subid = sub.id
                    WHERE sub.id = '$subid '  " ;
        $result3 = mysqli_query($conn,$query3);
        
       
        if($result3)
        {
           // $row3 = mysqli_fetch_assoc($result3);
           // echo $row3['fname'] ;
           // echo "success" ;
           
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
        .usname:hover{color: blue;}
        .nave{background-color: black; height: 70px; color: white;  }
        a.taga{ text-decoration: none; color:white; }
        a.taga:hover{color:red;}
        select,option{height: 40px; width: 300px;font-size: 3rem;margin: 0 0 0 0 ;}
        button[type=submit]{height: 40px;width: 110px;font-size: 2.3rem;}
        .menu {height: 350px;  padding: 10px 0 0 10px; font-size: 3rem;}      
    </style>
</head>
  
<body >
       <div class=" nave">
           <div class="container-fluid">
               <div class="row">
                    <div class="col" >
                            <p> <span style="font-size: 3em;">ระบบเกรดออฟไลน์ </span> 
                                 <span style="font-size: 1.7em;">G R A D E .com </span>
                             </p>
                    </div>
                    <div class="col" style="text-align: end;">
                            <p class="usname" style="font-size: 2rem;">
                                 <i class="fa fa-user"></i> &nbsp<?php echo $row1['username'] ?>
                            </p>
                           <p style="font-size: 2rem;">
                                 <a class="taga" href="login.php">ออกจากระบบ</a>
                            </p>
                    </div>
               </div>
           </div>
        </div>

            <div class="container">
                <div class="row">
                   <div class="col-4" style=" margin-top: 50px;">
                        <p style="font-size:3rem;font-weight:  bold; margin: 0 0 0 17%;">เลือกรายวิชาของคุณ</p> 
                   </div>
                   <div class="col" style="margin-top: 50px;">
                       <div >  
                          <form action="lookingrade.php" method="GET">
                             <select name="subid" style="background-color:#cccccc ; opacity:0.7; box-shadow: 0px 7px 5px grey;"> 
                                <option value="" >รายวิชา</option>
                               <?php
                                    while($row2 = mysqli_fetch_object($result2)){
                                        echo " <option value='".$row2->id."' name='subid'> ".$row2->subname."</option>";
                                    } 
                                     $_GET['subid'];
                                ?>

                             </select>
                             <button type="submit" name="submit" value="ค้นหา"  
                                     style="background-color: #404040;  color: white; border-color: #404040; margin-left: 2%;">
                                 ค้นหา<i class="fa fa-search"></i>
                            </button>
                                    
                            </form>
                        </div>
                    </div>
  
                </div>
            </div>

            <div class="container menu">
                <div class="row">
                    <div class="col" >
                          <div class="container">
                                <div class="row">
                                     <div class="col" >
                                            <div style="padding:0 0 0 160px; ">
                                                    <p>ชื่อวิชา : </p> 
                                                    <p>รหัสวิชา : </p> 
                                                    <p>อาจารย์ผู้สอน : </p>
                                                    <p>หน่วยกิต : </p> 
                                                    <p>เกรด : </p> 
                                            </div>
                                        </div>
                                        <div class="col" >
                                                <div class="pshow">
                                            <?php     while($row3 = mysqli_fetch_object($result3))
                                                    {
                                                    echo "<p>".$row3->subname." </p> 
                                                        <p>".$row3->subid."</p> 
                                                        <p>".$row3->fname." ".$row3->lname."</p>
                                                        <p> ".$row3->credit."</p> 
                                                        <p>".$row3->grade."</p> " ;
                                                    }
                                            ?>
                                                </div>
                                        </div>
                                        <div class="col" > </div>
                                </div>
                          </div>
                    </div>
                </div>
            </div>
</body>
</html>