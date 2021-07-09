
<?php
if(isset($_POST['sub'])){
 $insert=false;
 $server = "localhost";
 $username = "root";
 $password = "";
 $db="bv_trip";

$con= new mysqli($server, $username, $password,$db);
if(!$con){
    die("connection to this database failed due to". mysqli_connect_error());

}
//echo "success connection to the databse";
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql= "INSERT INTO bv_trip.trip ( person, age, gender, email, phone, other, dt) VALUES 
('$name', '$age', '$gender', '$email',  '$phone', '$desc', current_timestamp())";
//echo $sql;

if($con->query($sql)==true)
{
    $insert=true;
   // echo "successfully inserted";
}
else{
    echo "ERROR!! <br> $con->error";
}

$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Travel Form</title>
</head>
<body>
    <img src="bg.jpg" alt="" class="bg">
    <div class="container">
        <h1>Welcome to BV</h1>
        <p>Enter your deatils and submit this form to confirm your participation</p>
        <?php
            if($insert)
            {
                echo "<p class='sub_msg'>Thanks for submitting your form!</p>";
            }
            
        ?>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="your name">
            <input type="text" name="age" id="age" placeholder="your age">
            <input type="text" name="gender" id="gender" placeholder="your gender">
            <input type="text" name="email" id="email" placeholder="your email">
            <input type="text" name="phone" id="phone" placeholder="your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter other info"></textarea>
            <button name="sub" class="btn">Submit</button>
            
        </form>
    </div>

    <script src="index.js"></script>


</body>
</html>