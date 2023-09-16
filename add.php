<?php

include_once("connections/connection.php");
$con = connection();

    

    if(isset($_POST['submit'])){
        $first_Name = $_POST['firstName'];
        $last_Name = $_POST['lastName'];
        $e_mail = $_POST['email'];
        $gender= $_POST['gender'];

        $sql ="INSERT INTO `student_list`(`first_name`, `last_name`, `email`, `gender`) VALUES ('$first_Name','$last_Name','$e_mail','$gender')";

        $con->query($sql) or die ($con->error);

        echo header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <form action="" method="post">
        <label>First Name</label>
        <input type="text" name="firstName" id="search">

        <label>Last Name</label>
        <input type="text" name="lastName" id="search">

        <label>Email</label>
        <input type="email" name="email" id="search">

        <label>Last Name</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input type="submit" name="submit" value="submit form">


    </form>
    
</body>
</html>