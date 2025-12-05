<?php
session_start();

?>



<html>
    <head>
        <title>Display</title>
        
        <style>
            body{
                background-image: url(nature.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                min-height: 100%;
            }
            table{
                box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.589)
            }
        
            
            .update{
                background-color : green;
                color: white;
                border :0;
                outline: none;
                border-radius: 5px;
                height:17px;
                width: 80px;
                font-weight:bold;
                cursor:pointer;
            }
            .delete{
                background-color : red;
                color: white;
                border :0;
                outline: none;
                border-radius: 5px;
                height:17px;
                width: 80px;
                font-weight:bold;
                cursor:pointer;
            }
        </style>
    </head>

<?php
include("connect.php");
error_reporting(0);
if(isset($_SESSION['user_name'])) {
    $userprofile = $_SESSION['user_name'];
} else {
    header('location:login.php');
    exit;
}

$query = "SELECT * FROM form";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

// echo $total;
if($total !=0)
    {
     ?>
     <h2 align = "center"><mark>Displaing All Records</mark></h2>
     <center>
     <table border="1" cellspacing ="7" width = "82%">
    <tr>
        <th width = "1%">id</th>
        <th width = "8%">First_name</th>
        <th width = "8%">Last_name</th>
        <th width = "10%">Gender</th>
        <th width = "20%">Email</th>
        <th width = "10%">Phone</th> 
        <th width = "10%">Caste</th>
        <th width = "15%">Operations</th>
    </tr>

   

    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>" .$result['id']."</td>
        <td>" .$result['Firstname']."</td>
        <td>" .$result['Lastname']."</</td>
        <td>" .$result['Gender']."</</td>
        <td>" .$result['Email']."</</td>
        <td>" .$result['Phone']."</</td>
        <td>" .$result['Caste']."</</td>
        <td>
       <a href='update_design.php?id=$result[id]'>
    <button class='update'>Update</button></a>
    <a href='delete.php?id=$result[id]' onclick='return checkdelete()'>
                <input type='submit' value='Delete' class='delete'>
        </td>
    </tr>
    ";

    }
}
else{
    echo "No records found";
}

?>
</table>
</center>
    <a href="logout.php"><input type="submit" name="" value="Logout" style="background: red; color: white; height: 35px; width: 100px; margin-top: 20px; font-size: 18px; border: 0px; border-radius: 5px; cursor: pointer;justify-content: center; position: absolute;"></a>





<script>
function checkdelete()
{
    return confirm('Are you sure want to delete this record');
}

</script>
</html>



