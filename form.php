
<?php   
include ("connect.php");
?>
<html>
    <head>
          <title>PHP CRUD operation</title>
          
          <link rel="stylesheet" href="style.css">
           

    </head>
    <body>
      
        <div class="container">
            <form action="#" method ="POST">
            <div class="title">
                Registration Form
            </div>

            <div class="form">
                <div class="input_field">
                    <label>First name</label>
                    <input type="text" class="input" name="fname">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Last name</label>
                    <input type="text" class="input" name="lname">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="password">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Confirm password</label>
                    <input type="password" class="input"name = "compassword">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Gender</label>
                    <select class="selectbox" name="gender">
                        <option>
                            Select
                        </option>
                        <option>
                            Male
                        </option>
                        <option>
                            Female
                        </option>
                    </select>
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Email</label>
                    <input type="Email" class="input" name="email">
                </div>
                 <div class="form">
                <div class="input_field">
                    <label>Phone</label>
                    <input type="text" class="input" name="phone">
                </div>
                <div class="input_field" >
                    <label style="margin-right:100px;">Caste</label>
                    <input type="radio" value="Sunni" name="caste">
                    <label style="margin-left:5px;">Sunni</label>
                    <input type="radio" value= "Shia"name="caste">
                    <label style="margin-left:5px;">Shia</label>
                    <input type="radio" value="Christians"name="caste">
                    <label style="margin-left:5px;">Christians</label>
                </div>
              
                 
                <div class="input_field">
                    <input type="submit" value="Register" class="btn" name="register">
                </div>

            </div>
        </div>

    </body>
  

</html>

<?php
if (isset($_POST['register'])) {
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $pwd    = $_POST['password'];
    $cpwd   = $_POST['compassword'];
    $gender = $_POST['gender'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $caste =  $_POST['caste'];


    $query = "INSERT INTO form (Firstname, Lastname, Password, ConfirmPassword, Gender, Email, Phone, Caste) 
              VALUES ('$fname', '$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone', '$caste')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        #echo "✅ Data inserted successfully!";
    } else {
        echo "❌ Failed: " . mysqli_error($conn);
    }
}


?>




