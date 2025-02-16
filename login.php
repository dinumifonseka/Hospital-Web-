 <?php

 include 'connect.php';

 if(isset($_POST['Signup'])){
     

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];

    $checkEmail="SELECT * FROM users WHERE email='$email'";
    $result=$conn->query($selectEmail);
    if($result->num_rows>0){
        echo"Email already exists";
    }else{
        $insertQuery="INSERT INTO users (firstname,lastname,email,password)
        VALUES ('$firstname','$lastname','$email','$password')";
if($conn->query($insertQuery)===TRUE){
    header("Location:login.php");
}else{
    echo"Error".$insertQuery."<br>".$conn->error;

}
    }


 
  
 }
 if(isset($_POST['Login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
   $password=md5($password);
    $selectQuery="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=$conn->query($selectQuery);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location:home.php");
        exit();
    }else{
        echo"Invalid email or password";
    }
 }

     