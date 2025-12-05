<?php
session_start();
include("connect.php");

if(isset($_SESSION['user_name'])) {
    $userprofile = $_SESSION['user_name'];
} else {
    header('location:login.php');
    exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM form WHERE id='$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
?>


<html>
    <head>
          <title>PHP CRUD operation</title>
          <link rel="stylesheet" href="style.css">
          <img src="nature.jpg">

    </head>
    <body>
        <div class="container">
            <form action="#" method ="POST">
            <div class="title">
               Update Student details
            </div>

            <div class="form">
                <div class="input_field">
                    <label>First name</label>
                    <input type="text" value="<?php echo $result['Firstname'];?> " class="input" name="fname">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Last name</label>
                    <input type="text"value="<?php echo $result['Lastname'];?> " class="input" name="lname">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" value="<?php echo $result['Password'];?>" name="password">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Confirm password</label>
                    <input type="password" value="<?php echo $result['ConfirmPassword'];?>"class="input"name = "compassword">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Gender</label>
                    <select class="selectbox" name="gender" >
                        <option value ="">
                            Select
                        </option value>
                        <option value="male"
                            
                           <?php
                           if( $result['Gender'] == 'Male')
                           {
                            echo "Selected";
                           }

                           ?>

                        >
                            Male
                        </option>
                        <option value="female"
                           
                           <?php
                           if( $result['Gender']== 'Female')
                           {
                            echo "Selected";
                           }

                           ?>>
                            Female
                        </option>
                    </select>
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Email</label>
                    <input type="text" value="<?php echo $result['Email'];?>"class="input" name="email" required>
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Phone</label>
                    <input type="text" value="<?php echo $result['Phone'];?>"  class="input" name="phone">
                </div>
                 <div class="input_field" >
                    <label style="margin-right:100px;">Caste</label>
                    <input type="radio" value="Sunni" name="caste"
                    <?php
                    if($result['Caste'] == "Sunni")
                    {
                        echo "Checked";
                    }
                    
                    
                    ?>
                    >
                    <label style="margin-left:5px;">Sunni</label>
                    <input type="radio" value= "Shia"name="caste"
                    <?php
                    if($result['Caste'] == "Shia")
                    {
                        echo "Checked";
                    }
                    
                    
                    ?>>
                    <label style="margin-left:5px;">Shia</label>
                    <input type="radio" value="Christians"name="caste"
                    <?php
                    if($result['Caste'] == "Christians")
                    {
                        echo "Checked";
                    }
                    
                    
                    ?>>
                    <label style="margin-left:5px;">Christians</label>
                </div>
                
                 
                
                <div class="input_field">
                    <input type="submit" value="Update" class="btn" name="update">
                </div>

            </div>
        </div>

    </body>
  

</html>

<?php
if (isset($_POST['update'])) {
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $pwd    = $_POST['password'];
    $cpwd   = $_POST['compassword'];
    $gender = $_POST['gender'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $caste =  $_POST['caste'];

    $query = "UPDATE form SET 
    Firstname='$fname', 
    Lastname='$lname', 
    `Password`='$pwd', 
    ConfirmPassword='$cpwd', 
    Gender='$gender', 
    Email='$email', 
    Phone='$phone', 
    Caste='$caste'
    WHERE id='$id'";



    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Updated Successfully'); window.location.href='display.php';</script>";
    } else {
        echo "<b>Update Failed:</b> " . mysqli_error($conn);
    }
}








?>