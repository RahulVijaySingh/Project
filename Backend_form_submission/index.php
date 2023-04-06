
 
 <?php
$insert=false;
if(isset($_POST['name'])){

$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server,$username,$password);

if(!$con){
    die("connection to this database failed due to" .
    mysqli_connect_error());
}

// echo "Success connecting to the db";
$name=$_POST['name'];
$college=$_POST['college'];
$mobile_number=$_POST['mobile_number'];
$email=$_POST['email'];
$text=$_POST['text'];

$sql="INSERT INTO `web_webinar_form`.`attendant` ( `name`, `college`, `mobile_number`, `email`, `text`, `date_and_time`) VALUES ('$name', '$college', '$mobile_number', '$email', '$text', current_timestamp());";
echo $sql;

if($con->query($sql)==true){
    // echo "Successfully inserted";
    $insert=true;
}

else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();

}


?>


<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">


    <title>WEBINAR</title>
  </head>
  <body>
    <img class="bg" src="what-is-a-web-developer.jpg" alt="webd">
    <div class="container">

       
        <h3>WEBINAR ON FULLSTACK</h3>
        <h5>Fill this form to attend the webinar on talk of WEB DEVELOPMENT roadmap</h5>
        <?php
        if($insert==true){
        echo "<p class="submitmsg">Thanks for your response</p>"
        }
        ?>
        
      <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="name" />
        <input type="text" name="college" id="college" placeholder="college" />
        <input
          type="number"
          name="number"
          id="number"
          placeholder="Mobile Number"
        />
        <input type="email" name="email" id="email" placeholder="email" />
        <textarea
          name="text"
          id="text"
          cols="30"
          rows="10"
          placeholder="write if any suggestion you want to  give for the webinar"
        >
        </textarea>
        <button class="btn">Submit</button>
      </form>
    </div>

    

  </body>
</html>  

