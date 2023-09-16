<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "Welcome " . $_SESSION['UserLogin'];
}else{
    echo "Welcome Guest";
}

include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM student_list";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMA</title>
    <link rel="stylesheet" href="css/style.css">

    
</head>
<body>
    <h1>Student Management System</h1>
    <br/>
    <br/>

    <form action="result.php" method="get">
        <input type="text" name ="search" id = "search">

        <button type="submit">Search</button>


    </form>

    <?php if(isset($_SESSION['UserLogin'])){?>
    <a href="Logout.php"> Logout  </a>
    <?php }else{ ?>
        <a href="Login.php"> Login  </a>
    <?php }      ?>

    <a href="add.php"> add new </a>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last name</th>
            </tr>

            <tbody>
                <?php do{?>

            <tr>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                <td><?php echo $row['first_name']; ?> </td>
                <td><?php echo $row['last_name']; ?> </td>
            </tr>

            <?php }while($row = $students->fetch_assoc()); ?>
            </tbody>
        </thead>
    </table>
    
</body>
</html>