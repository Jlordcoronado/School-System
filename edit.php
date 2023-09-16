<?php

include_once("connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

    if(isset($_POST['submit'])){
        $first_Name = $_POST['firstName'];
        $last_Name = $_POST['lastName'];
        $e_mail = $_POST['email'];
        $gender= $_POST['gender'];

       

        $sql = "UPDATE student_list SET first_name = '$first_Name', last_name = '$last_Name', gender = '$gender', email = '$e_mail' WHERE id = '$id'";
        

        $con->query($sql) or die ($con->error);

        echo header("Location: details.php?ID=".$id);
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
        <input type="text" name="firstName" id="search" value="<?php echo $row['first_name'];?>">

        <label>Last Name</label>
        <input type="text" name="lastName" id="search" value="<?php echo $row['last_name'];?>">

        <label>Email</label>
        <input type="email" name="email" id="search">

        <label>Last Name</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
            <option value="Female" <?php echo($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
        </select>

        <input type="submit" name="submit" value="Update">


    </form>
    
</body>
</html>