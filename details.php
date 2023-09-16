<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "admin"){
    echo "Welcome " . $_SESSION['UserLogin'];
}else{
    echo header("Location: index.php");
}

include_once("connections/connection.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
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
    <br/>
<a href="index.php"><-Back</a>
<a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>

<form action="delete.php" method="post">

<?php if($_SESSION['Access'] == "admin"){?>
<button type = "submit" name = "delete">Delete</button>

<?php } ?>
    <input type="hidden" name="id" value ="<?php echo $row['id'];?>">
    
    

</form>
    <h2><?php echo $row['first_name'];?> <?php echo $row['last_name']; ?> <?php echo $row['email']; ?></h2>

    <p>is a <?php echo$row['gender']?></p>
    
</body>
</html>