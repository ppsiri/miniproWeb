<?php

    session_start();

    if(!$_SESSION['userid']){
        header("Location: index1.php");
    }else{

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <h1>You Are Member</h1>
        <h3> Hi,<?php echo$_SESSION['user']; ?> </h3>
        <p><a href="logout.php">Logout</a></p>
    </body>
</html>


<?php } ?>