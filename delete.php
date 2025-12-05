<?php
session_start();

?>


<?php
include('connect.php');
$id = $_GET['id'];
$userprofile = $_SESSION['user_name'];

if($userdelete== true)
{
  
}
else{
    header('location:login.php');
}

$query = "DELETE FROM form  WHERE id ='$id'  ";
$data = mysqli_query($conn, $query);

if($data)
{
    echo "Record deleted";

}
else{
    echo "Failed to delete";
}

?>