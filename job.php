<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email=$_POST['email'];
    $passwordd=$_POST['passwordd'];
    $number=$_POST['number'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $job_type=$_POST['job_type'];
    $salary=$_POST['salary'];
    $address=$_POST['address'];
    $description=$_POST['description'];
    $gender=$_POST['gender'];
    $photo = $name."_".$age;
    $photo .= ".jpg";

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "register";

  $conn = mysqli_connect($servername, $username, $password, $database);

    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "files/".$photo;
    if(move_uploaded_file($tempname,$folder))
    {
        $query = "INSERT INTO `reg`(`name`, `age`, `email`,`passwordd`,`number`,`city`,`state`,`pincode`,`job_type`,`salary`,`photo`,`address`,`description`,`gender`) VALUES ('{$name}','$age','$email', '$passwordd','$number','{$city}','{$state}','$pincode','$job_type','$salary','$photo','$address','$description''$gender')";
        if(mysqli_query($conn,$query))
        {
            echo "<script>alert('registered Succesfully !');</script>";
        }
        else 
        {
            echo "<script>alert('Unable To register !');</script>";
        }
    }
    else 
    {
        echo "<script>alert('Unable To register !');</script>";
    }
}
?>












<?php
if(isset($_POST['submit']))
{
$category = $_POST['category'];
if(!empty($category))
{
$query = "SELECT * FROM `products` WHERE category = '{$category}'";
$data = mysqli_query($conn,$query);
   if($data)
   {
    echo "<table>";
while($result = mysqli_fetch_assoc($data))
{

  echo "
  <tr><td><img src='assets/".$result['img']."' width='150px' height='150px'></td></tr>
  " ;
  echo "
  <tr><td>Category : ".$result['category']."</td></tr>
  " ;
  echo "
  <tr><td>Price : ".$result['price']."</td></tr>
  " ;

}
       echo "</table>";
   }
   else
   {
       echo "<script>alert('Unknown Error !')</script>";
   }
}
}
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $passwordd = $_POST['passwordd'];
    $number = $_POST['number'];
    $city= $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $job_type = $_POST['job_type'];
    $salary = $_POST['salary'];
    $images = $_FILES["photo"]['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
  
  // Connecting to the Database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "register";

  
  // Create a connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Die if connection was not successful
  if (!$conn){
      die("Sorry we failed to connect: ". mysqli_connect_error());
  }
  else{ 
    // Submit these to a database
    // Sql query to be executed 
    $sql = "INSERT INTO `reg` (`name`, `age` `email`, `passwordd`, `number`, `city`, `state`, `pincode`, `job_type`, `salary`, `images`, `aadharcard`, `address`, `gender`) VALUES ('$name', '$age', '$email', '$passwordd', '$number', '$city', '$state', '$pincode', '$job_type', '$salary', '$images', '$aadharcard', '$address', '$gender')";
    $result = mysqli_query($conn, $sql);
    if($result){
        move_uploaded_file($_FILES["photo"]['tmp_name'], "uploads/".$_FILES["photo"]['name']);
        move_uploaded_file($_FILES["aadharcard"]['tmp_name'], "uploads/".$_FILES["aadharcard"]['name']);
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your entry has been submitted successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>';
    }
    else{
        echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>';
    }

  }

}


?>
